<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliveries - PADS Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="/dynamic-css" rel="stylesheet">
    <style>
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo-container img {
            max-width: 150px;
            height: auto;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: linear-gradient(135deg, #1f8df4 0%, #043249 100%);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar .nav-link {
            color: #ffffff;
            padding: 15px 20px;
            border-radius: 0;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover {
            background: rgba(31, 141, 244, 0.2);
            color: #ffffff;
        }
        .sidebar .nav-link.active {
            background: var(--primary-color);
            color: #ffffff;
        }
        .sidebar-header {
            padding: 20px;
            background: linear-gradient(135deg, #043249 0%, #1f8df4 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .sidebar-header h4 {
            color: #ffffff;
            margin: 0;
        }
        .top-header {
            background: linear-gradient(135deg, #1f8df4 0%, #043249 100%);
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            color: #ffffff;
        }
        .top-header .text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
        }
        
        .global-search-input {
            background: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            color: #ffffff !important;
        }
        
        .global-search-input::placeholder {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        
        .global-search-input:focus {
            background: rgba(255, 255, 255, 0.2) !important;
            border-color: rgba(255, 255, 255, 0.5) !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25) !important;
            color: #ffffff !important;
        }
        
        .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.3) !important;
            color: #ffffff !important;
        }
        
        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            border-color: rgba(255, 255, 255, 0.5) !important;
        }
        .breadcrumb-item a {
            color: #ffffff;
            text-decoration: none;
        }
        .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .tracking-timeline {
            position: relative;
        }
        
        .timeline-item {
            position: relative;
            padding-left: 30px;
            margin-bottom: 20px;
        }
        
        .timeline-item:before {
            content: '';
            position: absolute;
            left: 8px;
            top: 0;
            bottom: -20px;
            width: 2px;
            background: #dee2e6;
        }
        
        .timeline-item:last-child:before {
            display: none;
        }
        
        .timeline-icon {
            position: absolute;
            left: 0;
            top: 0;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #28a745;
            border: 3px solid #fff;
            box-shadow: 0 0 0 3px #28a745;
        }
        
        .timeline-icon.pending {
            background: #ffc107;
            box-shadow: 0 0 0 3px #ffc107;
        }
        
        .timeline-icon.in-progress {
            background: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-color);
        }
        
        .timeline-icon.completed {
            background: #28a745;
            box-shadow: 0 0 0 3px #28a745;
        }
        
        .order-info-item {
            margin-bottom: 15px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .order-info-item strong {
            color: #495057;
        }
    </style>
</head>
<body>
    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&libraries=places"></script>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <img src="/assets/logos/logo.png" alt="PADS Logo" onerror="this.style.display='none'">
                    <h4>PADS Admin</h4>
                </div>
            </div>
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/super/dashboard">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/super/schools">
                        <i class="fas fa-school me-2"></i>
                        Schools
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/super/deliveries">
                        <i class="fas fa-shipping-fast me-2"></i>
                        Deliveries
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/super/reports">
                        <i class="fas fa-chart-bar me-2"></i>
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/super/calendar">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Calendar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/super/settings">
                        <i class="fas fa-cog me-2"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </nav>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Header -->
            <div class="top-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Deliveries</li>
                            </ol>
                        </nav>
                    </div>
                    
                    <!-- Search Bar -->
                    <div class="d-flex align-items-center">
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control global-search-input" placeholder="Search orders, schools, deliveries..." id="globalSearch">
                            <button class="btn btn-outline-light" type="button" onclick="performGlobalSearch()">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="text-muted">
                        <i class="fas fa-calendar-alt me-2"></i>
                        <?php echo date('F j, Y'); ?>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <!-- Order Tracking Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    <i class="fas fa-search me-2"></i>Track Order
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="orderNumber" 
                                                   placeholder="Enter order number (e.g., ORD-2025-001)" 
                                                   value="">
                                            <button class="btn btn-primary" type="button" onclick="trackOrder()">
                                                <i class="fas fa-search me-2"></i>Track Order
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success" onclick="showAllDeliveries()">
                                            <i class="fas fa-list me-2"></i>Show All Deliveries
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Details Section -->
                <div class="row mb-4" id="orderDetails" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Order Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="orderInfo">
                                            <!-- Order information will be populated here -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tracking-timeline">
                                            <h5>Delivery Status</h5>
                                            <div id="trackingTimeline">
                                                <!-- Tracking timeline will be populated here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Section -->
                <div class="row mb-4" id="mapSection" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    <i class="fas fa-map-marker-alt me-2"></i>Delivery Location
                                </h4>
                            </div>
                            <div class="card-body">
                                <div id="map" style="height: 400px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- All Deliveries Table -->
                <div class="row" id="allDeliveriesSection">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    <i class="fas fa-truck me-2"></i>All Deliveries
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="deliveriesTable">
                                        <thead>
                                            <tr>
                                                <th>Order Number</th>
                                                <th>School Name</th>
                                                <th>District</th>
                                                <th>Status</th>
                                                <th>Driver</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="deliveriesTableBody">
                                            <!-- Deliveries will be populated here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample delivery data
        const deliveries = [
            {
                orderNumber: 'ORD-2025-001',
                schoolName: 'Mwalimu Nyerere Primary School',
                district: 'Kinondoni',
                status: 'delivered',
                driver: 'John Mwamba',
                date: '2025-01-15',
                coordinates: { lat: -6.7924, lng: 39.2083 },
                timeline: [
                    { status: 'Order Placed', time: '2025-01-14 09:00', completed: true },
                    { status: 'Packed', time: '2025-01-14 14:30', completed: true },
                    { status: 'Out for Delivery', time: '2025-01-15 08:00', completed: true },
                    { status: 'Delivered', time: '2025-01-15 11:30', completed: true }
                ],
                items: [
                    { name: 'Sanitary Pads', quantity: 500, unit: 'packs' },
                    { name: 'Educational Materials', quantity: 50, unit: 'books' }
                ]
            },
            {
                orderNumber: 'ORD-2025-002',
                schoolName: 'Uhuru Secondary School',
                district: 'Ilala',
                status: 'in-transit',
                driver: 'Mary Kimani',
                date: '2025-01-16',
                coordinates: { lat: -6.8160, lng: 39.2803 },
                timeline: [
                    { status: 'Order Placed', time: '2025-01-15 10:00', completed: true },
                    { status: 'Packed', time: '2025-01-15 16:00', completed: true },
                    { status: 'Out for Delivery', time: '2025-01-16 09:00', completed: true },
                    { status: 'Delivered', time: 'Pending', completed: false }
                ],
                items: [
                    { name: 'Sanitary Pads', quantity: 750, unit: 'packs' },
                    { name: 'Health Education Booklets', quantity: 100, unit: 'books' }
                ]
            },
            {
                orderNumber: 'ORD-2025-003',
                schoolName: 'Azania Girls Secondary School',
                district: 'Temeke',
                status: 'pending',
                driver: 'David Mbwana',
                date: '2025-01-17',
                coordinates: { lat: -6.8700, lng: 39.2700 },
                timeline: [
                    { status: 'Order Placed', time: '2025-01-16 14:00', completed: true },
                    { status: 'Packed', time: 'In Progress', completed: false },
                    { status: 'Out for Delivery', time: 'Pending', completed: false },
                    { status: 'Delivered', time: 'Pending', completed: false }
                ],
                items: [
                    { name: 'Sanitary Pads', quantity: 600, unit: 'packs' },
                    { name: 'Hygiene Kits', quantity: 200, unit: 'kits' }
                ]
            }
        ];

        let map;
        let markers = [];

        // Initialize Google Maps
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: { lat: -6.7924, lng: 39.2083 }, // Dar es Salaam center
                mapTypeId: 'roadmap'
            });
        }

        // Track specific order
        function trackOrder() {
            const orderNumber = document.getElementById('orderNumber').value.trim();
            if (!orderNumber) {
                alert('Please enter an order number');
                return;
            }

            const delivery = deliveries.find(d => d.orderNumber.toLowerCase() === orderNumber.toLowerCase());
            if (!delivery) {
                alert('Order not found. Please check the order number.');
                return;
            }

            displayOrderDetails(delivery);
            showMapWithLocation(delivery);
        }

        // Display order details
        function displayOrderDetails(delivery) {
            const orderInfo = document.getElementById('orderInfo');
            const trackingTimeline = document.getElementById('trackingTimeline');

            // Order information
            const statusColor = getStatusColor(delivery.status);
            orderInfo.innerHTML = `
                <div class="order-info-item">
                    <strong>Order Number:</strong> ${delivery.orderNumber}
                </div>
                <div class="order-info-item">
                    <strong>School:</strong> ${delivery.schoolName}
                </div>
                <div class="order-info-item">
                    <strong>District:</strong> ${delivery.district}
                </div>
                <div class="order-info-item">
                    <strong>Status:</strong> 
                    <span class="badge bg-${statusColor}">${delivery.status.toUpperCase()}</span>
                </div>
                <div class="order-info-item">
                    <strong>Driver:</strong> ${delivery.driver}
                </div>
                <div class="order-info-item">
                    <strong>Delivery Date:</strong> ${delivery.date}
                </div>
                <div class="order-info-item">
                    <strong>Items:</strong>
                    <ul class="mt-2">
                        ${delivery.items.map(item => `<li>${item.name}: ${item.quantity} ${item.unit}</li>`).join('')}
                    </ul>
                </div>
            `;

            // Tracking timeline
            trackingTimeline.innerHTML = delivery.timeline.map(item => {
                const iconClass = item.completed ? 'completed' : 'pending';
                return `
                    <div class="timeline-item">
                        <div class="timeline-icon ${iconClass}"></div>
                        <div class="timeline-content">
                            <strong>${item.status}</strong><br>
                            <small class="text-muted">${item.time}</small>
                        </div>
                    </div>
                `;
            }).join('');

            // Show the order details section
            document.getElementById('orderDetails').style.display = 'block';
            document.getElementById('allDeliveriesSection').style.display = 'none';
        }

        // Show map with delivery location
        function showMapWithLocation(delivery) {
            if (!map) {
                initMap();
            }

            // Clear existing markers
            markers.forEach(marker => marker.setMap(null));
            markers = [];

            // Add marker for delivery location
            const marker = new google.maps.Marker({
                position: delivery.coordinates,
                map: map,
                title: delivery.schoolName,
                icon: {
                    url: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png',
                    scaledSize: new google.maps.Size(32, 32)
                }
            });

            // Info window
            const infoWindow = new google.maps.InfoWindow({
                content: `
                    <div style="padding: 10px;">
                        <h6><strong>${delivery.schoolName}</strong></h6>
                        <p><strong>Order:</strong> ${delivery.orderNumber}</p>
                        <p><strong>Status:</strong> <span class="badge bg-${getStatusColor(delivery.status)}">${delivery.status.toUpperCase()}</span></p>
                        <p><strong>Driver:</strong> ${delivery.driver}</p>
                        <p><strong>District:</strong> ${delivery.district}</p>
                    </div>
                `
            });

            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });

            markers.push(marker);

            // Center map on delivery location
            map.setCenter(delivery.coordinates);
            map.setZoom(15);

            // Show the map section
            document.getElementById('mapSection').style.display = 'block';
        }

        // Show all deliveries table
        function showAllDeliveries() {
            const tableBody = document.getElementById('deliveriesTableBody');
            
            tableBody.innerHTML = deliveries.map(delivery => {
                const statusColor = getStatusColor(delivery.status);
                return `
                    <tr>
                        <td><strong>${delivery.orderNumber}</strong></td>
                        <td>${delivery.schoolName}</td>
                        <td>${delivery.district}</td>
                        <td><span class="badge bg-${statusColor}">${delivery.status.toUpperCase()}</span></td>
                        <td>${delivery.driver}</td>
                        <td>${delivery.date}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="trackSpecificOrder('${delivery.orderNumber}')">
                                <i class="fas fa-eye"></i> Track
                            </button>
                            <button class="btn btn-sm btn-success" onclick="showOnMap('${delivery.orderNumber}')">
                                <i class="fas fa-map-marker-alt"></i> Map
                            </button>
                        </td>
                    </tr>
                `;
            }).join('');

            // Hide order details and show all deliveries
            document.getElementById('orderDetails').style.display = 'none';
            document.getElementById('mapSection').style.display = 'none';
            document.getElementById('allDeliveriesSection').style.display = 'block';
        }

        // Track specific order from table
        function trackSpecificOrder(orderNumber) {
            document.getElementById('orderNumber').value = orderNumber;
            trackOrder();
        }

        // Show specific delivery on map
        function showOnMap(orderNumber) {
            const delivery = deliveries.find(d => d.orderNumber === orderNumber);
            if (delivery) {
                showMapWithLocation(delivery);
            }
        }

        // Get status color for badges
        function getStatusColor(status) {
            switch(status.toLowerCase()) {
                case 'delivered': return 'success';
                case 'in-transit': return 'warning';
                case 'pending': return 'secondary';
                default: return 'primary';
            }
        }

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Google Maps
            initMap();
            
            // Check if there's a tracking parameter in URL
            const urlParams = new URLSearchParams(window.location.search);
            const trackingNumber = urlParams.get('track');
            
            if (trackingNumber) {
                // Auto-fill order number and track
                document.getElementById('orderNumber').value = trackingNumber;
                trackOrder();
            } else {
                // Show all deliveries by default
                showAllDeliveries();
            }
            
            // Add enter key support for order tracking
            document.getElementById('orderNumber').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    trackOrder();
                }
            });
        });
        
        function performGlobalSearch() {
            const searchTerm = document.getElementById('globalSearch').value.trim();
            
            if (searchTerm === '') {
                alert('Please enter a search term');
                return;
            }
            
            // Check if search term looks like an order number
            if (searchTerm.match(/^(ORD|TRK)/i)) {
                // Use the existing tracking functionality
                document.getElementById('orderNumber').value = searchTerm;
                trackOrder();
            } else {
                // General search - redirect to appropriate page based on context
                if (searchTerm.toLowerCase().includes('school')) {
                    window.location.href = '/super/schools?search=' + encodeURIComponent(searchTerm);
                } else if (searchTerm.toLowerCase().includes('report')) {
                    window.location.href = '/super/reports?search=' + encodeURIComponent(searchTerm);
                } else {
                    // Search in current page deliveries
                    searchInDeliveries(searchTerm);
                }
            }
        }
        
        function searchInDeliveries(searchTerm) {
            // Filter deliveries based on search term
            const filteredDeliveries = deliveries.filter(delivery => 
                delivery.orderNumber.toLowerCase().includes(searchTerm.toLowerCase()) ||
                delivery.schoolName.toLowerCase().includes(searchTerm.toLowerCase()) ||
                delivery.productName.toLowerCase().includes(searchTerm.toLowerCase()) ||
                delivery.status.toLowerCase().includes(searchTerm.toLowerCase())
            );
            
            displayDeliveries(filteredDeliveries);
        }
        
        // Handle Enter key press in search input
        document.getElementById('globalSearch').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                performGlobalSearch();
            }
        });

        // Add active class to current navigation item
        const currentPath = window.location.pathname;
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    </script>
</body>
</html>

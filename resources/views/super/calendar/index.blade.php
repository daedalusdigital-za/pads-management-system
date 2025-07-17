<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar - PADS Management System</title>
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
        
        .calendar-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .calendar-nav {
            display: flex;
            gap: 15px;
        }
        
        .calendar-nav button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .calendar-nav button:hover {
            background: var(--secondary-color);
        }
        
        .calendar-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--secondary-color);
        }
        
        .calendar-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        .calendar-table th,
        .calendar-table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #e9ecef;
            position: relative;
        }
        
        .calendar-table th {
            background: var(--primary-color);
            color: white;
            font-weight: bold;
        }
        
        .calendar-table td {
            height: 100px;
            vertical-align: top;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .calendar-table td:hover {
            background-color: #f8f9fa;
        }
        
        .calendar-table td.other-month {
            color: #ccc;
            background-color: #f8f9fa;
        }
        
        .calendar-table td.today {
            background-color: rgba(31, 141, 244, 0.1);
            border: 2px solid var(--primary-color);
        }
        
        .calendar-table td.has-delivery {
            background-color: rgba(31, 141, 244, 0.05);
        }
        
        .delivery-count {
            position: absolute;
            top: 5px;
            right: 5px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }
        
        .delivery-details {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
        }
        
        .delivery-item {
            border-left: 4px solid var(--primary-color);
            padding: 10px 15px;
            margin-bottom: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .delivery-item h6 {
            margin: 0 0 5px 0;
            color: var(--secondary-color);
        }
        
        .delivery-item p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }
        
        .status-badge {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .status-delivered {
            background: #d4edda;
            color: #155724;
        }
        
        .status-in-transit {
            background: #d1ecf1;
            color: #0c5460;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>
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
                    <a class="nav-link" href="/super/deliveries">
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
                    <a class="nav-link active" href="/super/calendar">
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
                                <li class="breadcrumb-item active" aria-current="page">Calendar</li>
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
            
            <!-- Calendar Container -->
            <div class="calendar-container">
                <div class="calendar-header">
                    <h2 class="calendar-title" id="calendarTitle">
                        <?php echo date('F Y'); ?>
                    </h2>
                    <div class="calendar-nav">
                        <button onclick="previousMonth()">
                            <i class="fas fa-chevron-left"></i> Previous
                        </button>
                        <button onclick="nextMonth()">
                            Next <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                
                <table class="calendar-table" id="calendarTable">
                    <thead>
                        <tr>
                            <th>Sunday</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                        </tr>
                    </thead>
                    <tbody id="calendarBody">
                        <!-- Calendar days will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
            
            <!-- Delivery Details -->
            <div class="delivery-details" id="deliveryDetails" style="display: none;">
                <h4>Deliveries for <span id="selectedDate"></span></h4>
                <div id="deliveryList">
                    <!-- Delivery items will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let currentDate = new Date();
        let selectedDate = null;
        
        // Sample delivery data with dates
        const deliveryData = {
            '2025-01-15': [
                {
                    id: 'TRK001',
                    school: 'Sunrise Elementary',
                    product: 'Mathematics Textbook Grade 5',
                    quantity: 30,
                    status: 'delivered',
                    time: '10:30 AM'
                }
            ],
            '2025-01-18': [
                {
                    id: 'TRK002',
                    school: 'Westfield High School',
                    product: 'Science Laboratory Kit',
                    quantity: 15,
                    status: 'in-transit',
                    time: '02:15 PM'
                }
            ],
            '2025-01-20': [
                {
                    id: 'TRK003',
                    school: 'Central Middle School',
                    product: 'Art Supplies Set',
                    quantity: 25,
                    status: 'pending',
                    time: '09:00 AM'
                },
                {
                    id: 'TRK004',
                    school: 'Oak Valley Elementary',
                    product: 'Physical Education Equipment',
                    quantity: 40,
                    status: 'delivered',
                    time: '01:30 PM'
                }
            ]
        };
        
        function generateCalendar(year, month) {
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const startDate = new Date(firstDay);
            startDate.setDate(startDate.getDate() - firstDay.getDay());
            
            const calendarBody = document.getElementById('calendarBody');
            calendarBody.innerHTML = '';
            
            const today = new Date();
            let currentWeek = document.createElement('tr');
            
            for (let i = 0; i < 42; i++) {
                const cellDate = new Date(startDate);
                cellDate.setDate(startDate.getDate() + i);
                
                const cell = document.createElement('td');
                cell.textContent = cellDate.getDate();
                cell.onclick = () => selectDate(cellDate);
                
                // Check if date is in current month
                if (cellDate.getMonth() !== month) {
                    cell.classList.add('other-month');
                }
                
                // Check if date is today
                if (cellDate.toDateString() === today.toDateString()) {
                    cell.classList.add('today');
                }
                
                // Check if date has deliveries
                const dateStr = cellDate.toISOString().split('T')[0];
                if (deliveryData[dateStr]) {
                    cell.classList.add('has-delivery');
                    const count = document.createElement('div');
                    count.className = 'delivery-count';
                    count.textContent = deliveryData[dateStr].length;
                    cell.appendChild(count);
                }
                
                currentWeek.appendChild(cell);
                
                if ((i + 1) % 7 === 0) {
                    calendarBody.appendChild(currentWeek);
                    currentWeek = document.createElement('tr');
                }
            }
            
            // Update calendar title
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'];
            document.getElementById('calendarTitle').textContent = `${monthNames[month]} ${year}`;
        }
        
        function selectDate(date) {
            selectedDate = date;
            const dateStr = date.toISOString().split('T')[0];
            const deliveries = deliveryData[dateStr] || [];
            
            document.getElementById('selectedDate').textContent = date.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            const deliveryList = document.getElementById('deliveryList');
            deliveryList.innerHTML = '';
            
            if (deliveries.length === 0) {
                deliveryList.innerHTML = '<p class="text-muted">No deliveries scheduled for this date.</p>';
            } else {
                deliveries.forEach(delivery => {
                    const item = document.createElement('div');
                    item.className = 'delivery-item';
                    item.innerHTML = `
                        <h6>${delivery.id} - ${delivery.school}</h6>
                        <p><strong>Product:</strong> ${delivery.product}</p>
                        <p><strong>Quantity:</strong> ${delivery.quantity}</p>
                        <p><strong>Time:</strong> ${delivery.time}</p>
                        <p><strong>Status:</strong> <span class="status-badge status-${delivery.status}">${delivery.status.replace('-', ' ').toUpperCase()}</span></p>
                    `;
                    deliveryList.appendChild(item);
                });
            }
            
            document.getElementById('deliveryDetails').style.display = 'block';
        }
        
        function previousMonth() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        }
        
        function nextMonth() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        }
        
        // Initialize calendar
        generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
        
        function performGlobalSearch() {
            const searchTerm = document.getElementById('globalSearch').value.trim();
            
            if (searchTerm === '') {
                alert('Please enter a search term');
                return;
            }
            
            // Check if search term looks like an order number
            if (searchTerm.match(/^(ORD|TRK)/i)) {
                // Redirect to deliveries page with tracking
                window.location.href = '/super/deliveries?search=' + encodeURIComponent(searchTerm);
            } else {
                // General search - redirect to appropriate page based on context
                if (searchTerm.toLowerCase().includes('school')) {
                    window.location.href = '/super/schools?search=' + encodeURIComponent(searchTerm);
                } else if (searchTerm.toLowerCase().includes('delivery') || searchTerm.toLowerCase().includes('track')) {
                    window.location.href = '/super/deliveries?search=' + encodeURIComponent(searchTerm);
                } else if (searchTerm.toLowerCase().includes('report')) {
                    window.location.href = '/super/reports?search=' + encodeURIComponent(searchTerm);
                } else {
                    // Default to deliveries page for general search
                    window.location.href = '/super/deliveries?search=' + encodeURIComponent(searchTerm);
                }
            }
        }
        
        // Handle Enter key press in search input
        document.getElementById('globalSearch').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                performGlobalSearch();
            }
        });
        
        // Set active nav item
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.classList.remove('active');
        });
        document.querySelector('.sidebar .nav-link[href="/super/calendar"]').classList.add('active');
    </script>
</body>
</html>

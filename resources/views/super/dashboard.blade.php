<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PADS Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1f8df4;
            --secondary-color: #043249;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        .bg-primary {
            background-color: var(--primary-color) !important;
        }
        
        .sidebar .nav-link.active {
            background-color: var(--primary-color) !important;
        }
    </style>
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
        .stat-card {
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .quick-action-btn {
            height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: white;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .quick-action-btn:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .quick-action-btn i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .chart-container {
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f8f9fa;
            border-radius: 10px;
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
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <img src="/assets/logos/logo.png" alt="PADS Logo" style="max-height: 40px; max-width: 100%; margin-bottom: 10px;" onerror="this.style.display='none'">
                    <h4>PADS Admin</h4>
                </div>
            </div>
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="/super/dashboard">
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
                    <a class="nav-link" href="/super/calendar">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Calendar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/super/documents">
                        <i class="fas fa-file-alt me-2"></i>
                        Documents
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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                        <a href="/super/calendar" class="text-decoration-none" style="color: rgba(255, 255, 255, 0.8);">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <?php echo date('F j, Y'); ?>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Dashboard Overview</h2>
                            <div class="text-muted">
                                <i class="fas fa-user me-2"></i>
                                Welcome, Admin
                            </div>
                        </div>
                        
                        <!-- Stats Cards -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="card text-white bg-primary stat-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4 class="mb-0">150</h4>
                                                <p class="mb-0">Total Schools</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-school fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card text-white bg-success stat-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4 class="mb-0">1,250</h4>
                                                <p class="mb-0">Total Deliveries</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-shipping-fast fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card text-white bg-warning stat-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4 class="mb-0">25</h4>
                                                <p class="mb-0">Pending</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-clock fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card text-white bg-info stat-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4 class="mb-0">50,000</h4>
                                                <p class="mb-0">Pads Distributed</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-chart-line fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Charts Row -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Monthly Distribution</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-container">
                                            <div class="text-center">
                                                <i class="fas fa-chart-bar fa-3x text-muted"></i>
                                                <p class="text-muted mt-2">Chart will be displayed here</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">School Distribution</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-container">
                                            <div class="text-center">
                                                <i class="fas fa-chart-pie fa-3x text-muted"></i>
                                                <p class="text-muted mt-2">Chart will be displayed here</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Quick Actions</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <a href="/super/reports" class="quick-action-btn bg-primary">
                                                    <i class="fas fa-chart-bar"></i>
                                                    <span>View Reports</span>
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <a href="/super/reports/import" class="quick-action-btn bg-success">
                                                    <i class="fas fa-upload"></i>
                                                    <span>Import Data</span>
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <a href="/super/schools" class="quick-action-btn bg-info">
                                                    <i class="fas fa-school"></i>
                                                    <span>Manage Schools</span>
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <a href="/super/deliveries" class="quick-action-btn bg-warning">
                                                    <i class="fas fa-shipping-fast"></i>
                                                    <span>Track Orders</span>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <!-- Order Tracking Widget -->
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="card bg-light">
                                                    <div class="card-body">
                                                        <h6 class="card-title">
                                                            <i class="fas fa-search me-2"></i>Quick Order Tracking
                                                        </h6>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="dashboardOrderNumber" 
                                                                           placeholder="Enter order number (e.g., ORD-2025-001)">
                                                                    <button class="btn btn-primary" type="button" onclick="quickTrackOrder()">
                                                                        <i class="fas fa-search"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mt-2 mt-md-0">
                                                                <small class="text-muted">Try: ORD-2025-001, ORD-2025-002, ORD-2025-003</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        // Quick order tracking from dashboard
        function quickTrackOrder() {
            const orderNumber = document.getElementById('dashboardOrderNumber').value.trim();
            if (!orderNumber) {
                alert('Please enter an order number');
                return;
            }
            
            // Redirect to deliveries page with order number
            window.location.href = `/super/deliveries?track=${encodeURIComponent(orderNumber)}`;
        }

        // Add enter key support for quick tracking
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('dashboardOrderNumber').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    quickTrackOrder();
                }
            });
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
                                                <i class="fas fa-school fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card text-white bg-success">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4>1,250</h4>
                                                <p class="mb-0">Total Deliveries</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-shipping-fast fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card text-white bg-warning">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4>25</h4>
                                                <p class="mb-0">Pending</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-clock fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4>50,000</h4>
                                                <p class="mb-0">Pads Distributed</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-chart-line fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Quick Actions</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="/super/reports" class="btn btn-primary w-100 mb-2">
                                                    <i class="fas fa-chart-bar me-2"></i>
                                                    View Reports
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="/super/reports/import" class="btn btn-success w-100 mb-2">
                                                    <i class="fas fa-upload me-2"></i>
                                                    Import Data
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="/super/schools" class="btn btn-info w-100 mb-2">
                                                    <i class="fas fa-school me-2"></i>
                                                    Manage Schools
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="/super/deliveries" class="btn btn-warning w-100 mb-2">
                                                    <i class="fas fa-shipping-fast me-2"></i>
                                                    Track Deliveries
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
        
        // Quick tracking functionality
        function trackOrderFromDashboard() {
            const orderNumber = document.getElementById('quickTrackInput').value.trim();
            if (orderNumber) {
                window.location.href = '/super/deliveries?track=' + encodeURIComponent(orderNumber);
            }
        }
        
        // Set active nav item
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.classList.remove('active');
        });
        document.querySelector('.sidebar .nav-link[href="/super/dashboard"]').classList.add('active');
    </script>
</body>
</html>

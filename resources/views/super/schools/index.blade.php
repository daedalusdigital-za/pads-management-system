<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schools - PADS Management System</title>
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
                    <a class="nav-link active" href="/super/schools">
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
                                <li class="breadcrumb-item active" aria-current="page">Schools</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Schools Management</h4>
                            </div>
                            <div class="card-body">
                                <div class="text-center py-5">
                                    <i class="fas fa-school fa-5x text-muted mb-4"></i>
                                    <h3>Schools Management</h3>
                                    <p class="text-muted">School management features will be implemented here.</p>
                                    <a href="/super/reports" class="btn btn-primary">
                                        <i class="fas fa-chart-bar me-2"></i>View Reports
                                    </a>
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
                    // Stay on current page for school searches
                    alert('School search functionality will be implemented here');
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
        document.querySelector('.sidebar .nav-link[href="/super/schools"]').classList.add('active');
    </script>
    <script>
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

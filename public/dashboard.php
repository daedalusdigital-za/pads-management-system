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
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
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
            text-align: center;
        }
        
        .top-header {
            background: linear-gradient(135deg, #1f8df4 0%, #043249 100%);
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            color: #ffffff;
        }
        
        .stat-card {
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .chart-container {
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f8f9fa;
            border-radius: 10px;
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
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <h4>🎯 PADS Admin</h4>
            </div>
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="schools.php">
                        <i class="fas fa-school me-2"></i>
                        Schools
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deliveries.php">
                        <i class="fas fa-shipping-fast me-2"></i>
                        Deliveries
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php">
                        <i class="fas fa-chart-bar me-2"></i>
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calendar.php">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Calendar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="documents.php">
                        <i class="fas fa-file-alt me-2"></i>
                        Documents
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
                                <li class="breadcrumb-item"><a href="test.php" style="color: white;">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: rgba(255,255,255,0.8);">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                    
                    <div style="color: rgba(255,255,255,0.8);">
                        <i class="fas fa-calendar-alt me-2"></i>
                        <?php echo date('F j, Y'); ?>
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
                                                <a href="reports.php" class="quick-action-btn bg-primary">
                                                    <i class="fas fa-chart-bar"></i>
                                                    <span>View Reports</span>
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <a href="schools.php" class="quick-action-btn bg-success">
                                                    <i class="fas fa-school"></i>
                                                    <span>Manage Schools</span>
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <a href="deliveries.php" class="quick-action-btn bg-info">
                                                    <i class="fas fa-shipping-fast"></i>
                                                    <span>Track Orders</span>
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <a href="documents.php" class="quick-action-btn bg-warning">
                                                    <i class="fas fa-file-alt"></i>
                                                    <span>Documents</span>
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
</body>
</html>

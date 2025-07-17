<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Reports - PADS Management System</title>
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
            border-bottom: 1px solid #495057;
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
                    <a class="nav-link active" href="/super/reports">
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
                                <li class="breadcrumb-item"><a href="/super/reports">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Import</li>
                            </ol>
                        </nav>
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
                                <h4 class="card-title mb-0">Import Reports</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Choose Excel File</label>
                                        <input type="file" class="form-control" id="file" name="file" accept=".xlsx,.xls,.csv" required>
                                        <div class="form-text">Please select an Excel file (.xlsx, .xls) or CSV file.</div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-upload me-2"></i>Import Reports
                                    </button>
                                    <a href="/super/reports" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>Back to Reports
                                    </a>
                                </form>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Import Reports</h4>
                                <a href="{{ route('reports.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Reports
                                </a>
                            </div>
                            
                            <div class="card-body">
                                <!-- Success and Error Messages -->
                                <?php if(isset($_SESSION['success'])): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo $_SESSION['success']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?php echo $_SESSION['error']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="/super/reports/import" method="POST" enctype="multipart/form-data">
                                            <!-- CSRF token would go here in a real Laravel app -->
                                            
                                            <div class="mb-4">
                                                <h5>Upload Excel File</h5>
                                                <p class="text-muted">Upload an Excel file (.xlsx, .xls) or CSV file containing reports data.</p>
                                                
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">Select File</label>
                                                    <input type="file" class="form-control @error('file') is-invalid @enderror" 
                                                           id="file" name="file" accept=".xlsx,.xls,.csv" required>
                                                    @error('file')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-upload"></i> Import Reports
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title">File Requirements</h5>
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-check text-success"></i> Excel files (.xlsx, .xls) or CSV</li>
                                                    <li><i class="fas fa-check text-success"></i> Maximum file size: 10MB</li>
                                                    <li><i class="fas fa-check text-success"></i> First row should contain headers</li>
                                                </ul>
                                                
                                                <h6 class="mt-3">Required Columns:</h6>
                                                <ul class="list-unstyled small">
                                                    <li>• District No</li>
                                                    <li>• Ward No</li>
                                                    <li>• School Name</li>
                                                    <li>• School Type</li>
                                                    <li>• No of Learners</li>
                                                    <li>• No of Girls</li>
                                                    <li>• No of Pads</li>
                                                    <li>• Date Delivered</li>
                                                    <li>• Remarks (optional)</li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="card bg-info text-white mt-3">
                                            <div class="card-body">
                                                <h6 class="card-title">Sample Template</h6>
                                                <p class="card-text small">Download a sample template to ensure your file format is correct.</p>
                                                <a href="#" class="btn btn-light btn-sm">
                                                    <i class="fas fa-download"></i> Download Template
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

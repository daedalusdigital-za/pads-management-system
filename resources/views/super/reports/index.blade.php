<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - PADS Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
                                <li class="breadcrumb-item active" aria-current="page">Reports</li>
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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Reports Management</h4>
                                <div>
                                    <a href="{{ route('reports.import') }}" class="btn btn-primary">
                                        <i class="fas fa-upload"></i> Import Reports
                                    </a>
                                    <a href="{{ route('reports.analytics') }}" class="btn btn-info">
                                        <i class="fas fa-chart-bar"></i> Analytics
                                    </a>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <!-- Filters -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <form method="GET" action="{{ route('reports.index') }}" class="row g-3">
                                            <div class="col-md-2">
                                                <select name="district" class="form-select">
                                                    <option value="">All Districts</option>
                                                    <?php foreach($districts as $district): ?>
                                                        <option value="<?php echo $district; ?>" <?php echo (isset($_GET['district']) && $_GET['district'] == $district) ? 'selected' : ''; ?>>
                                                            District <?php echo $district; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="ward" class="form-select">
                                                    <option value="">All Wards</option>
                                                    <?php foreach($wards as $ward): ?>
                                                        <option value="<?php echo $ward; ?>" <?php echo (isset($_GET['ward']) && $_GET['ward'] == $ward) ? 'selected' : ''; ?>>
                                                            Ward <?php echo $ward; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="school_type" class="form-select">
                                                    <option value="">All Types</option>
                                                    <?php foreach($schoolTypes as $type): ?>
                                                        <option value="<?php echo $type; ?>" <?php echo (isset($_GET['school_type']) && $_GET['school_type'] == $type) ? 'selected' : ''; ?>>
                                                            <?php echo ucfirst($type); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="date" name="date_from" class="form-control" value="<?php echo isset($_GET['date_from']) ? $_GET['date_from'] : ''; ?>" placeholder="From Date">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="date" name="date_to" class="form-control" value="<?php echo isset($_GET['date_to']) ? $_GET['date_to'] : ''; ?>" placeholder="To Date">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                                <a href="/super/reports" class="btn btn-secondary">Reset</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Reports Table -->
                                <div class="table-responsive">
                                    <table id="reportsTable" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>District</th>
                                                <th>Ward</th>
                                                <th>School Name</th>
                                                <th>School Type</th>
                                                <th>Learners</th>
                                                <th>Girls</th>
                                                <th>Pads</th>
                                                <th>Date Delivered</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($reports) > 0): ?>
                                                <?php foreach($reports as $report): ?>
                                                    <tr>
                                                        <td><?php echo $report->district_no; ?></td>
                                                        <td><?php echo $report->ward_no; ?></td>
                                                        <td><?php echo $report->school_name; ?></td>
                                                        <td><?php echo ucfirst($report->school_type); ?></td>
                                                        <td><?php echo number_format($report->no_of_learners); ?></td>
                                                        <td><?php echo number_format($report->no_of_girls); ?></td>
                                                        <td><?php echo number_format($report->no_of_pads); ?></td>
                                                        <td><?php echo $report->date_delivered; ?></td>
                                                        <td><?php echo $report->remarks; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="9" class="text-center">
                                                        <div class="py-4">
                                                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                            <h5 class="text-muted">No reports found</h5>
                                                            <p class="text-muted">Upload an Excel file to get started</p>
                                                            <a href="/super/reports/import" class="btn btn-primary">
                                                                <i class="fas fa-upload me-2"></i>Import Reports
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    <p class="text-muted">Showing <?php echo count($reports); ?> record(s)</p>
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
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#reportsTable').DataTable({
                "pageLength": 25,
                "order": [[ 7, "desc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [8] }
                ]
            });
        });
    </script>
</body>
</html>

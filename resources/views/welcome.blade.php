<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PADS Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="/dynamic-css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1f8df4 0%, #043249 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .welcome-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 3rem;
            text-align: center;
            max-width: 500px;
        }
        .logo {
            font-size: 3rem;
            color: #1f8df4;
            margin-bottom: 1rem;
        }
        .btn-custom {
            background: #1f8df4;
            border-color: #1f8df4;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 500;
        }
        .btn-custom:hover {
            background: #043249;
            border-color: #043249;
        }
    </style>
</head>
<body>
    <div class="welcome-card">
        <div class="logo">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <h1 class="h2 mb-3">PADS Management System</h1>
        <p class="text-muted mb-4">Welcome to the Pad Distribution Management System. Manage schools, deliveries, and reports efficiently.</p>
        
        <div class="d-grid gap-3">
            <a href="/super/dashboard" class="btn btn-primary btn-custom">
                <i class="fas fa-tachometer-alt me-2"></i>
                Go to Dashboard
            </a>
            <a href="/super/reports" class="btn btn-outline-primary">
                <i class="fas fa-chart-bar me-2"></i>
                View Reports
            </a>
            <a href="/super/reports/import" class="btn btn-outline-success">
                <i class="fas fa-upload me-2"></i>
                Import Data
            </a>
        </div>
        
        <div class="mt-4">
            <small class="text-muted">
                <i class="fas fa-shield-alt me-1"></i>
                Secure Admin Access
            </small>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

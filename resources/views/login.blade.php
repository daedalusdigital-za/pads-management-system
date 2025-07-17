<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PADS Management System</title>
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
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 3rem;
            width: 100%;
            max-width: 400px;
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
    <div class="login-card">
        <div class="text-center">
            <div class="logo">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <h1 class="h3 mb-3">PADS Management System</h1>
            <p class="text-muted mb-4">Please sign in to continue</p>
        </div>
        
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-custom">
                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                </button>
            </div>
        </form>
        
        <div class="text-center mt-4">
            <small class="text-muted">
                <i class="fas fa-shield-alt me-1"></i>
                Secure Access
            </small>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

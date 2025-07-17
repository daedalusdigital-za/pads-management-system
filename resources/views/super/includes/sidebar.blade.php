<!-- Sidebar Navigation -->
<nav class="sidebar bg-dark text-white" id="sidebar">
    <div class="sidebar-header p-3">
        <h4 class="mb-0">PADS Admin</h4>
    </div>
    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white <?php echo (strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false) ? 'active' : ''; ?>" 
               href="/super/dashboard">
                <i class="fas fa-tachometer-alt me-2"></i>
                Dashboard
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link text-white <?php echo (strpos($_SERVER['REQUEST_URI'], 'schools') !== false) ? 'active' : ''; ?>" 
               href="/super/schools">
                <i class="fas fa-school me-2"></i>
                Schools
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link text-white <?php echo (strpos($_SERVER['REQUEST_URI'], 'deliveries') !== false) ? 'active' : ''; ?>" 
               href="/super/deliveries">
                <i class="fas fa-shipping-fast me-2"></i>
                Deliveries
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link text-white <?php echo (strpos($_SERVER['REQUEST_URI'], 'reports') !== false) ? 'active' : ''; ?>" 
               href="/super/reports">
                <i class="fas fa-chart-bar me-2"></i>
                Reports
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link text-white <?php echo (strpos($_SERVER['REQUEST_URI'], 'settings') !== false) ? 'active' : ''; ?>" 
               href="/super/settings">
                <i class="fas fa-cog me-2"></i>
                Settings
            </a>
        </li>
        
        <li class="nav-item mt-4">
            <a class="nav-link text-white" href="/logout">
                <i class="fas fa-sign-out-alt me-2"></i>
                Logout
            </a>
        </li>
    </ul>
</nav>

<style>
.sidebar {
    min-height: 100vh;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    transition: all 0.3s ease;
}

.sidebar .nav-link {
    padding: 0.75rem 1rem;
    border-radius: 0;
    transition: all 0.3s ease;
}

.sidebar .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
    color: white !important;
}

.sidebar .nav-link.active {
    background-color: var(--bs-primary);
    color: white !important;
}

.main-content {
    margin-left: 250px;
    padding: 0;
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .sidebar {
        margin-left: -250px;
    }
    
    .main-content {
        margin-left: 0;
    }
    
    .sidebar.show {
        margin-left: 0;
    }
}
</style>

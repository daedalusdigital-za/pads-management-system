<!-- Sidebar Navigation -->
<nav class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo-container">
            <img src="/assets/logos/logo.png" alt="PADS Logo" style="max-height: 40px; max-width: 100%; margin-bottom: 10px;" onerror="this.style.display='none'">
        </div>
        <h4>PADS Admin</h4>
    </div>
    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('super/dashboard') ? 'active' : '' }}" 
               href="/super/dashboard">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('super/schools*') ? 'active' : '' }}" 
               href="/super/schools">
                <i class="fas fa-school"></i>
                <span>Schools</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('super/deliveries*') ? 'active' : '' }}" 
               href="/super/deliveries">
                <i class="fas fa-shipping-fast"></i>
                <span>Deliveries</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('super/documents*') ? 'active' : '' }}" 
               href="/super/documents">
                <i class="fas fa-file-alt"></i>
                <span>Documents</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('super/calendar*') ? 'active' : '' }}" 
               href="/super/calendar">
                <i class="fas fa-calendar-alt"></i>
                <span>Calendar</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('super/reports*') ? 'active' : '' }}" 
               href="/super/reports">
                <i class="fas fa-chart-bar"></i>
                <span>Reports</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('super/settings*') ? 'active' : '' }}" 
               href="/super/settings">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</nav>

<!-- Main Content Area -->
<div class="main-content">
</style>

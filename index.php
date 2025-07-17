<?php

// Simple PHP router for the PADS Management System
// This allows us to run the application without composer

// Set up basic error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the request URI
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Remove query parameters
$path = strtok($path, '?');

// Handle static assets
if (strpos($path, '/assets/') === 0) {
    $filePath = __DIR__ . $path;
    if (file_exists($filePath)) {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $mimeTypes = [
            'css' => 'text/css',
            'js' => 'text/javascript',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon'
        ];
        
        if (isset($mimeTypes[$extension])) {
            header('Content-Type: ' . $mimeTypes[$extension]);
        }
        
        readfile($filePath);
        exit;
    }
}

// Define routes
$routes = [
    '/' => 'welcome',
    '/super/dashboard' => 'super/dashboard',
    '/super/reports' => 'super/reports/index',
    '/super/reports/import' => 'super/reports/import',
    '/super/schools' => 'super/schools/index',
    '/super/deliveries' => 'super/deliveries/index',
    '/super/calendar' => 'super/calendar/index',
    '/super/settings' => 'super/settings/index',
    '/dynamic-css' => 'dynamic-css',
    '/api/deliveries' => 'api/deliveries',
    '/api/deliveries/track' => 'api/deliveries/track'
];

// Handle dynamic CSS route
if ($path === '/dynamic-css') {
    header('Content-Type: text/css');
    echo "
    :root {
        --bs-primary: #1f8df4;
        --bs-secondary: #043249;
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
    
    .btn-secondary {
        background-color: var(--secondary-color) !important;
        border-color: var(--secondary-color) !important;
    }
    
    .btn-secondary:hover {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
    }
    
    .text-secondary {
        color: var(--secondary-color) !important;
    }
    
    .bg-secondary {
        background-color: var(--secondary-color) !important;
    }
    
    .badge-primary {
        background-color: var(--primary-color) !important;
    }
    
    .badge-secondary {
        background-color: var(--secondary-color) !important;
    }
    
    .btn-outline-primary {
        color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
    }
    
    .btn-outline-primary:hover {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
    }
    
    .btn-outline-secondary {
        color: var(--secondary-color) !important;
        border-color: var(--secondary-color) !important;
    }
    
    .btn-outline-secondary:hover {
        background-color: var(--secondary-color) !important;
        border-color: var(--secondary-color) !important;
    }
    
    .link-primary {
        color: var(--primary-color) !important;
    }
    
    .link-secondary {
        color: var(--secondary-color) !important;
    }
    
    .border-primary {
        border-color: var(--primary-color) !important;
    }
    
    .border-secondary {
        border-color: var(--secondary-color) !important;
    }
    ";
    exit;
}

// Handle API routes
if (strpos($path, '/api/') === 0) {
    header('Content-Type: application/json');
    
    // Sample delivery data with coordinates
    $deliveries = [
        [
            'id' => 'TRK001',
            'order_number' => 'ORD-2024-001',
            'school_name' => 'Sunrise Elementary',
            'school_address' => '123 Education St, Learning City, LC 12345',
            'product_name' => 'Mathematics Textbook Grade 5',
            'quantity' => 30,
            'delivery_date' => '2024-01-15',
            'delivery_time' => '10:30 AM',
            'status' => 'delivered',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'timeline' => [
                ['status' => 'Order Placed', 'date' => '2024-01-10', 'time' => '09:00 AM'],
                ['status' => 'Preparing', 'date' => '2024-01-12', 'time' => '02:00 PM'],
                ['status' => 'Out for Delivery', 'date' => '2024-01-15', 'time' => '08:00 AM'],
                ['status' => 'Delivered', 'date' => '2024-01-15', 'time' => '10:30 AM']
            ]
        ],
        [
            'id' => 'TRK002',
            'order_number' => 'ORD-2024-002',
            'school_name' => 'Westfield High School',
            'school_address' => '456 Academic Ave, Study Town, ST 67890',
            'product_name' => 'Science Laboratory Kit',
            'quantity' => 15,
            'delivery_date' => '2024-01-18',
            'delivery_time' => '02:15 PM',
            'status' => 'in_transit',
            'latitude' => 40.7589,
            'longitude' => -73.9851,
            'timeline' => [
                ['status' => 'Order Placed', 'date' => '2024-01-14', 'time' => '11:30 AM'],
                ['status' => 'Preparing', 'date' => '2024-01-16', 'time' => '01:45 PM'],
                ['status' => 'Out for Delivery', 'date' => '2024-01-18', 'time' => '09:30 AM']
            ]
        ]
    ];
    
    if ($path === '/api/deliveries') {
        echo json_encode($deliveries);
        exit;
    }
    
    if ($path === '/api/deliveries/track') {
        $orderNumber = $_GET['order_number'] ?? '';
        $delivery = null;
        
        foreach ($deliveries as $d) {
            if ($d['order_number'] === $orderNumber || $d['id'] === $orderNumber) {
                $delivery = $d;
                break;
            }
        }
        
        if ($delivery) {
            echo json_encode($delivery);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Order not found']);
        }
        exit;
    }
    
    http_response_code(404);
    echo json_encode(['error' => 'API endpoint not found']);
    exit;
}

// Simple route function
function route($name, $params = []) {
    $routes = [
        'dashboard' => '/super/dashboard',
        'reports.index' => '/super/reports',
        'reports.import' => '/super/reports/import',
        'schools.index' => '/super/schools',
        'deliveries.index' => '/super/deliveries',
        'settings.index' => '/super/settings',
        'login' => '/login',
        'logout' => '/logout'
    ];
    
    return $routes[$name] ?? '#';
}

// Simple request helper
function request() {
    return (object) [
        'routeIs' => function($pattern) {
            $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            if (strpos($pattern, '*') !== false) {
                $pattern = str_replace('*', '', $pattern);
                return strpos($currentPath, $pattern) !== false;
            }
            return $currentPath === $pattern;
        }
    ];
}

// Find the view file
$viewFile = null;
if (isset($routes[$path])) {
    $viewName = $routes[$path];
    $viewFile = __DIR__ . '/resources/views/' . $viewName . '.php';
    
    // If .php doesn't exist, try .blade.php
    if (!file_exists($viewFile)) {
        $viewFile = __DIR__ . '/resources/views/' . $viewName . '.blade.php';
    }
}

// Handle 404
if (!$viewFile || !file_exists($viewFile)) {
    http_response_code(404);
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>404 - Page Not Found</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body class='bg-light'>
        <div class='container mt-5'>
            <div class='row justify-content-center'>
                <div class='col-md-6 text-center'>
                    <h1 class='display-1 text-primary'>404</h1>
                    <h2>Page Not Found</h2>
                    <p class='text-muted'>The page you're looking for doesn't exist.</p>
                    <a href='/' class='btn btn-primary'>Go Home</a>
                </div>
            </div>
        </div>
    </body>
    </html>";
    exit;
}

// Sample data for reports
$reports = [
    (object)[
        'district_no' => 'D001',
        'ward_no' => 'W001',
        'school_name' => 'Sample Primary School',
        'school_type' => 'Primary',
        'no_of_learners' => 150,
        'no_of_girls' => 75,
        'no_of_pads' => 300,
        'date_delivered' => '2024-01-15',
        'remarks' => 'Successfully delivered'
    ],
    (object)[
        'district_no' => 'D002',
        'ward_no' => 'W002',
        'school_name' => 'Demo Secondary School',
        'school_type' => 'Secondary',
        'no_of_learners' => 200,
        'no_of_girls' => 95,
        'no_of_pads' => 450,
        'date_delivered' => '2024-01-20',
        'remarks' => 'Completed successfully'
    ]
];

$districts = ['D001', 'D002'];
$wards = ['W001', 'W002'];
$schoolTypes = ['Primary', 'Secondary'];

// Include the view
ob_start();
include $viewFile;
$content = ob_get_clean();

// Process basic Blade syntax
$content = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?php echo $1; ?>', $content);
$content = preg_replace('/@include\(\'(.+?)\'\)/', '<?php include __DIR__ . "/resources/views/super/$1.blade.php"; ?>', $content);
$content = preg_replace('/@if\((.+?)\)/', '<?php if($1): ?>', $content);
$content = preg_replace('/@endif/', '<?php endif; ?>', $content);
$content = preg_replace('/@foreach\((.+?)\)/', '<?php foreach($1): ?>', $content);
$content = preg_replace('/@endforeach/', '<?php endforeach; ?>', $content);
$content = preg_replace('/@forelse\((.+?)\)/', '<?php if(!empty($1)): foreach($1 as $key => $value): ?>', $content);
$content = preg_replace('/@empty/', '<?php endforeach; else: ?>', $content);
$content = preg_replace('/@endforelse/', '<?php endif; ?>', $content);

// Fix include paths in the content - need to use absolute paths
$content = str_replace("include 'includes/sidebar.blade.php'", "include '" . __DIR__ . "/resources/views/super/includes/sidebar.blade.php'", $content);
$content = str_replace("include 'includes/header.blade.php'", "include '" . __DIR__ . "/resources/views/super/includes/header.blade.php'", $content);

// Output the processed content
eval('?>' . $content);

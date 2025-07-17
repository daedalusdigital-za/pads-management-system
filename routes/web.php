<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('super.dashboard');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    // Login logic here
    return redirect()->route('dashboard');
})->name('login.post');

Route::get('/logout', function () {
    // Logout logic here
    return redirect()->route('login');
})->name('logout');

Route::post('/logout', function () {
    // Logout logic here
    return redirect()->route('login');
});

// Super Admin Routes
Route::prefix('super')->group(function () {
    Route::get('/dashboard', function () {
        return view('super.dashboard');
    })->name('dashboard');
    
    Route::get('/schools', function () {
        return view('super.schools.index');
    })->name('schools.index');
    
    Route::get('/deliveries', function () {
        return view('super.deliveries.index');
    })->name('deliveries.index');
    
    // Reports routes - simplified for now
    Route::get('/reports', function () {
        // Simple reports view with sample data
        $reports = collect([
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
            ]
        ]);
        $districts = collect(['D001', 'D002']);
        $wards = collect(['W001', 'W002']);
        $schoolTypes = collect(['Primary', 'Secondary']);
        
        return view('super.reports.index', compact('reports', 'districts', 'wards', 'schoolTypes'));
    })->name('reports.index');
    
    Route::get('/reports/import', function () {
        return view('super.reports.import');
    })->name('reports.import');
    
    Route::post('/reports/import', function () {
        return redirect()->route('reports.index')
            ->with('success', 'Reports imported successfully!');
    })->name('reports.process.import');
    
    Route::get('/settings', function () {
        return view('super.settings.index');
    })->name('settings.index');
    
    Route::get('/calendar', function () {
        return view('super.calendar.index');
    })->name('calendar.index');
    
    Route::get('/documents', function () {
        return view('super.documents.index');
    })->name('documents.index');
});

// Dynamic CSS route
Route::get('/dynamic-css', function () {
    $css = "
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
    ";
    
    return response($css, 200)
        ->header('Content-Type', 'text/css');
});

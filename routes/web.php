<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;

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

// Settings routes
Route::get('/super/settings', [SettingsController::class, 'index'])->name('super.settings.index');
Route::post('/super/settings/general', [SettingsController::class, 'updateGeneral'])->name('super.settings.general');
Route::post('/super/settings/import', [SettingsController::class, 'importData'])->name('super.settings.import');
Route::post('/super/settings/export', [SettingsController::class, 'exportData'])->name('super.settings.export');
Route::post('/super/settings/optimize-database', [SettingsController::class, 'optimizeDatabase'])->name('super.settings.optimize-database');
Route::post('/super/settings/clear-cache', [SettingsController::class, 'clearCache'])->name('super.settings.clear-cache');
Route::post('/super/settings/rebuild-indexes', [SettingsController::class, 'rebuildIndexes'])->name('super.settings.rebuild-indexes');
Route::post('/super/settings/cleanup-logs', [SettingsController::class, 'cleanupLogs'])->name('super.settings.cleanup-logs');
Route::post('/super/settings/create-backup', [SettingsController::class, 'createBackup'])->name('super.settings.create-backup');
Route::post('/super/settings/restore-backup', [SettingsController::class, 'restoreBackup'])->name('super.settings.restore-backup');
Route::post('/super/settings/delete-backup', [SettingsController::class, 'deleteBackup'])->name('super.settings.delete-backup');
Route::post('/super/settings/restore-from-file', [SettingsController::class, 'restoreFromFile'])->name('super.settings.restore-from-file');

// Additional settings routes
Route::post('/super/settings/appearance', [SettingsController::class, 'updateAppearance'])->name('super.settings.appearance');
Route::post('/super/settings/backup', [SettingsController::class, 'createBackup'])->name('super.settings.backup');
Route::get('/super/settings/backups', [SettingsController::class, 'getBackups'])->name('super.settings.backups');
Route::post('/super/settings/restore', [SettingsController::class, 'restoreBackup'])->name('super.settings.restore');
Route::delete('/super/settings/backup/{filename}', [SettingsController::class, 'deleteBackupFile'])->name('super.settings.backup.delete');
Route::post('/super/settings/reset', [SettingsController::class, 'resetSettings'])->name('super.settings.reset');
Route::post('/super/settings/test-email', [SettingsController::class, 'testEmail'])->name('super.settings.test-email');


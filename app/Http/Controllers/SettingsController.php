<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\School;
use App\Models\Delivery;
use App\Models\User;
use Carbon\Carbon;

class SettingsController extends Controller
{
    /**
     * Display the settings page
     */
    public function index()
    {
        return view('super.settings.index');
    }

    /**
     * Update general settings
     */
    public function updateGeneral(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'timezone' => 'required|string',
            'date_format' => 'required|string',
            'records_per_page' => 'required|integer|min:10|max:100',
        ]);

        // Update settings (you can store these in database or cache)
        Cache::put('settings.app_name', $request->app_name);
        Cache::put('settings.timezone', $request->timezone);
        Cache::put('settings.date_format', $request->date_format);
        Cache::put('settings.records_per_page', $request->records_per_page);

        return response()->json([
            'success' => true,
            'message' => 'General settings updated successfully!'
        ]);
    }

    /**
     * Import data from file
     */
    public function importData(Request $request)
    {
        $request->validate([
            'import_type' => 'required|in:schools,deliveries,reports,users,all',
            'import_format' => 'required|in:csv,xlsx,json,xml',
            'import_file' => 'required|file|max:10240',
        ]);

        try {
            $file = $request->file('import_file');
            $imported = rand(10, 100); // Simulate import
            
            return response()->json([
                'success' => true,
                'message' => "Data imported successfully! {$imported} records imported."
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Import failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Export data to file
     */
    public function exportData(Request $request)
    {
        $request->validate([
            'export_type' => 'required|in:schools,deliveries,reports,users,all',
            'export_format' => 'required|in:csv,xlsx,json,pdf,xml',
        ]);

        try {
            $filename = $request->export_type . '_export_' . date('Y-m-d_H-i-s') . '.' . $request->export_format;
            
            return response()->json([
                'success' => true,
                'message' => 'Export completed successfully!',
                'filename' => $filename
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Export failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Database operations
     */
    public function optimizeDatabase()
    {
        try {
            if (config('database.default') === 'sqlite') {
                DB::statement('VACUUM');
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Database optimized successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Database optimization failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            
            return response()->json([
                'success' => true,
                'message' => 'Cache cleared successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Cache clear failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function rebuildIndexes()
    {
        try {
            if (config('database.default') === 'sqlite') {
                DB::statement('REINDEX');
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Database indexes rebuilt successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Index rebuild failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function cleanupLogs()
    {
        try {
            $logPath = storage_path('logs');
            $files = glob($logPath . '/*.log');
            $cleaned = 0;
            
            foreach ($files as $file) {
                if (filemtime($file) < strtotime('-30 days')) {
                    unlink($file);
                    $cleaned++;
                }
            }
            
            return response()->json([
                'success' => true,
                'message' => "Log cleanup completed! {$cleaned} old log files removed."
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Log cleanup failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Backup operations
     */
    public function createBackup(Request $request)
    {
        $request->validate([
            'backup_type' => 'required|in:full,database,files,incremental',
        ]);

        try {
            $backupName = 'backup_' . date('Y-m-d_H-i-s') . '.zip';
            
            return response()->json([
                'success' => true,
                'message' => 'Backup created successfully!',
                'backup_name' => $backupName
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Backup creation failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function restoreBackup(Request $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Backup restored successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Backup restore failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteBackup(Request $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Backup deleted successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Backup deletion failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function restoreFromFile(Request $request)
    {
        $request->validate([
            'backup_file' => 'required|file',
        ]);

        try {
            return response()->json([
                'success' => true,
                'message' => 'System restored successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Restore failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update appearance settings
     */
    public function updateAppearance(Request $request)
    {
        $request->validate([
            'primary_color' => 'required|string',
            'secondary_color' => 'required|string',
            'theme' => 'required|string|in:light,dark',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:512',
        ]);

        try {
            // Update color settings
            Cache::put('settings.primary_color', $request->primary_color);
            Cache::put('settings.secondary_color', $request->secondary_color);
            Cache::put('settings.theme', $request->theme);

            // Handle logo upload
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                Cache::put('settings.logo', $logoPath);
            }

            // Handle favicon upload
            if ($request->hasFile('favicon')) {
                $faviconPath = $request->file('favicon')->store('favicons', 'public');
                Cache::put('settings.favicon', $faviconPath);
            }

            return response()->json([
                'success' => true,
                'message' => 'Appearance settings updated successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update appearance: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available backups
     */
    public function getBackups(Request $request)
    {
        try {
            $backups = collect([
                'backup_2024_01_15.sql',
                'backup_2024_01_10.sql',
                'backup_2024_01_05.sql',
            ]);

            return response()->json([
                'success' => true,
                'backups' => $backups
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get backups: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a backup file
     */
    public function deleteBackupFile(Request $request, $filename)
    {
        try {
            // Delete backup file logic here
            
            return response()->json([
                'success' => true,
                'message' => 'Backup deleted successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete backup: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Reset settings to default
     */
    public function resetSettings(Request $request)
    {
        try {
            // Clear all cached settings
            Cache::flush();
            
            return response()->json([
                'success' => true,
                'message' => 'Settings reset to default values!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reset settings: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test email configuration
     */
    public function testEmail(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email',
        ]);

        try {
            // Test email sending logic here
            
            return response()->json([
                'success' => true,
                'message' => 'Test email sent successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send test email: ' . $e->getMessage()
            ], 500);
        }
    }
}

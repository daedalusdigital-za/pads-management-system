@php $page="Settings"; @endphp
@include('super.includes.header')
@include('super.includes.sidebar')

<div class="content-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3><i class="fas fa-cogs me-2"></i>Settings</h3>
                        <p class="mb-0">Configure your application settings and preferences</p>
                    </div>
                    <div class="card-body">
                        <!-- Settings Navigation Tabs -->
                        <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">
                                    <i class="fas fa-home me-2"></i>General
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="system-tab" data-bs-toggle="tab" data-bs-target="#system" type="button" role="tab">
                                    <i class="fas fa-server me-2"></i>System
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="appearance-tab" data-bs-toggle="tab" data-bs-target="#appearance" type="button" role="tab">
                                    <i class="fas fa-palette me-2"></i>Appearance
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="backup-tab" data-bs-toggle="tab" data-bs-target="#backup" type="button" role="tab">
                                    <i class="fas fa-database me-2"></i>Backup
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab">
                                    <i class="fas fa-bell me-2"></i>Notifications
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content mt-4" id="settingsTabContent">
                            <!-- General Settings -->
                            <div class="tab-pane fade show active" id="general" role="tabpanel">
                                <h4 class="text-primary mb-3">General Settings</h4>
                                <form id="generalForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="app_name" class="form-label">Application Name</label>
                                                <input type="text" class="form-control" id="app_name" name="app_name" value="PADS Management System">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="app_version" class="form-label">Application Version</label>
                                                <input type="text" class="form-control" id="app_version" name="app_version" value="1.0.0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="contact_email" class="form-label">Contact Email</label>
                                                <input type="email" class="form-control" id="contact_email" name="contact_email" value="admin@pads.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="contact_phone" class="form-label">Contact Phone</label>
                                                <input type="tel" class="form-control" id="contact_phone" name="contact_phone" value="+1 (555) 123-4567">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="app_description" class="form-label">Application Description</label>
                                        <textarea class="form-control" id="app_description" name="app_description" rows="3">Pads and Delivery System for managing school supplies and deliveries.</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="organization_address" class="form-label">Organization Address</label>
                                        <textarea class="form-control" id="organization_address" name="organization_address" rows="3">123 Main Street, City, State, ZIP Code</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save General Settings
                                    </button>
                                </form>
                            </div>

                            <!-- System Settings -->
                            <div class="tab-pane fade" id="system" role="tabpanel">
                                <h4 class="text-primary mb-3">System Settings</h4>
                                <form id="systemForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="timezone" class="form-label">Timezone</label>
                                                <select class="form-select" id="timezone" name="timezone">
                                                    <option value="UTC">UTC</option>
                                                    <option value="America/New_York">Eastern Time</option>
                                                    <option value="America/Chicago">Central Time</option>
                                                    <option value="America/Denver">Mountain Time</option>
                                                    <option value="America/Los_Angeles">Pacific Time</option>
                                                    <option value="Europe/London">London</option>
                                                    <option value="Europe/Paris">Paris</option>
                                                    <option value="Asia/Tokyo">Tokyo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="date_format" class="form-label">Date Format</label>
                                                <select class="form-select" id="date_format" name="date_format">
                                                    <option value="Y-m-d">YYYY-MM-DD</option>
                                                    <option value="m/d/Y">MM/DD/YYYY</option>
                                                    <option value="d/m/Y">DD/MM/YYYY</option>
                                                    <option value="M d, Y">Month DD, YYYY</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="records_per_page" class="form-label">Records Per Page</label>
                                                <input type="number" class="form-control" id="records_per_page" name="records_per_page" value="10" min="5" max="100">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="maintenance_mode" class="form-label">Maintenance Mode</label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="maintenance_mode" name="maintenance_mode">
                                                    <label class="form-check-label" for="maintenance_mode">Enable maintenance mode</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save System Settings
                                    </button>
                                </form>
                            </div>

                            <!-- Email Settings -->
                            <div class="tab-pane fade" id="email" role="tabpanel">
                                <h4 class="text-primary mb-3">Email Settings</h4>
                                <form id="emailForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mail_driver" class="form-label">Mail Driver</label>
                                                <select class="form-select" id="mail_driver" name="mail_driver">
                                                    <option value="smtp">SMTP</option>
                                                    <option value="sendmail">Sendmail</option>
                                                    <option value="mailgun">Mailgun</option>
                                                    <option value="ses">Amazon SES</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mail_host" class="form-label">SMTP Host</label>
                                                <input type="text" class="form-control" id="mail_host" name="mail_host" value="smtp.gmail.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mail_port" class="form-label">SMTP Port</label>
                                                <input type="number" class="form-control" id="mail_port" name="mail_port" value="587">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mail_username" class="form-label">SMTP Username</label>
                                                <input type="text" class="form-control" id="mail_username" name="mail_username" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mail_password" class="form-label">SMTP Password</label>
                                        <input type="password" class="form-control" id="mail_password" name="mail_password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mail_from_address" class="form-label">From Address</label>
                                        <input type="email" class="form-control" id="mail_from_address" name="mail_from_address" value="noreply@pads.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mail_from_name" class="form-label">From Name</label>
                                        <input type="text" class="form-control" id="mail_from_name" name="mail_from_name" value="PADS Management System">
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Email Settings
                                    </button>
                                </form>
                            </div>

                            <!-- Appearance Settings -->
                            <div class="tab-pane fade" id="appearance" role="tabpanel">
                                <h4 class="text-primary mb-3">Appearance Settings</h4>
                                <form id="appearanceForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="primary_color" class="form-label">Primary Color</label>
                                                <input type="color" class="form-control form-control-color" id="primary_color" name="primary_color" value="#1f8df4">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="secondary_color" class="form-label">Secondary Color</label>
                                                <input type="color" class="form-control form-control-color" id="secondary_color" name="secondary_color" value="#043249">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="logo" class="form-label">Logo Upload</label>
                                                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="favicon" class="form-label">Favicon Upload</label>
                                                <input type="file" class="form-control" id="favicon" name="favicon" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="theme" class="form-label">Theme</label>
                                        <select class="form-select" id="theme" name="theme">
                                            <option value="light">Light</option>
                                            <option value="dark">Dark</option>
                                            <option value="auto">Auto</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Appearance Settings
                                    </button>
                                </form>
                            </div>

                            <!-- Backup Settings -->
                            <div class="tab-pane fade" id="backup" role="tabpanel">
                                <h4 class="text-primary mb-3">Backup & Restore</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><i class="fas fa-download me-2"></i>Database Backup</h5>
                                            </div>
                                            <div class="card-body">
                                                <p>Create a backup of your database and settings.</p>
                                                <button type="button" class="btn btn-success" onclick="createBackup()">
                                                    <i class="fas fa-download me-2"></i>Create Backup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><i class="fas fa-upload me-2"></i>Database Restore</h5>
                                            </div>
                                            <div class="card-body">
                                                <p>Restore your database from a backup file.</p>
                                                <input type="file" class="form-control mb-3" id="backupFile" accept=".sql,.zip">
                                                <button type="button" class="btn btn-warning" onclick="restoreBackup()">
                                                    <i class="fas fa-upload me-2"></i>Restore Backup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h5>Recent Backups</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Filename</th>
                                                    <th>Created</th>
                                                    <th>Size</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="backupsList">
                                                <tr>
                                                    <td>backup_2024_01_15_120000.sql</td>
                                                    <td>2024-01-15 12:00:00</td>
                                                    <td>2.5 MB</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">
                                                            <i class="fas fa-download"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Notifications Settings -->
                            <div class="tab-pane fade" id="notifications" role="tabpanel">
                                <h4 class="text-primary mb-3">Notification Settings</h4>
                                <form id="notificationsForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5><i class="fas fa-envelope me-2"></i>Email Notifications</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="email_new_orders" name="email_new_orders" checked>
                                                        <label class="form-check-label" for="email_new_orders">New Orders</label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="email_delivery_updates" name="email_delivery_updates" checked>
                                                        <label class="form-check-label" for="email_delivery_updates">Delivery Updates</label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="email_system_alerts" name="email_system_alerts" checked>
                                                        <label class="form-check-label" for="email_system_alerts">System Alerts</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5><i class="fas fa-bell me-2"></i>Push Notifications</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="push_new_orders" name="push_new_orders" checked>
                                                        <label class="form-check-label" for="push_new_orders">New Orders</label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="push_delivery_updates" name="push_delivery_updates" checked>
                                                        <label class="form-check-label" for="push_delivery_updates">Delivery Updates</label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="push_system_alerts" name="push_system_alerts" checked>
                                                        <label class="form-check-label" for="push_system_alerts">System Alerts</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">
                                        <i class="fas fa-save me-2"></i>Save Notification Settings
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #1f8df4;
        --secondary-color: #043249;
    }
    
    .card {
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border: none;
        border-radius: 10px;
    }
    
    .card-header {
        border-radius: 10px 10px 0 0 !important;
        border-bottom: 1px solid #e9ecef;
    }
    
    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
    }
    
    .nav-tabs .nav-link.active {
        color: var(--primary-color);
        border-bottom: 2px solid var(--primary-color);
        background: transparent;
    }
    
    .nav-tabs .nav-link:hover {
        color: var(--primary-color);
        border-color: transparent;
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
    
    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(31, 141, 244, 0.25);
    }
    
    .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .table thead th {
        background-color: var(--primary-color);
        color: white;
        border: none;
    }
    
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
</style>

<script>
$(document).ready(function() {
    // Form submission handlers
    $('#generalForm').on('submit', function(e) {
        e.preventDefault();
        saveSettings('general', $(this).serialize());
    });
    
    $('#systemForm').on('submit', function(e) {
        e.preventDefault();
        saveSettings('system', $(this).serialize());
    });
    
    $('#emailForm').on('submit', function(e) {
        e.preventDefault();
        saveSettings('email', $(this).serialize());
    });
    
    $('#appearanceForm').on('submit', function(e) {
        e.preventDefault();
        saveSettings('appearance', $(this).serialize());
    });
    
    $('#notificationsForm').on('submit', function(e) {
        e.preventDefault();
        saveSettings('notifications', $(this).serialize());
    });
});

function saveSettings(section, data) {
    // Show loading state
    const btn = $(`#${section}Form button[type="submit"]`);
    const originalText = btn.html();
    btn.html('<i class="fas fa-spinner fa-spin me-2"></i>Saving...');
    btn.prop('disabled', true);
    
    $.ajax({
        url: '/super/settings/' + section,
        method: 'POST',
        data: data,
        success: function(response) {
            showAlert('success', response.message || 'Settings saved successfully!');
        },
        error: function(xhr) {
            const response = xhr.responseJSON;
            showAlert('error', response.message || 'Failed to save settings');
        },
        complete: function() {
            btn.html(originalText);
            btn.prop('disabled', false);
        }
    });
}

function showAlert(type, message) {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const alertHtml = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;
    
    $('.tab-pane.active').prepend(alertHtml);
    
    // Auto-dismiss after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut();
    }, 5000);
}

function createBackup() {
    if (confirm('Are you sure you want to create a backup?')) {
        const btn = $('button[onclick="createBackup()"]');
        const originalText = btn.html();
        btn.html('<i class="fas fa-spinner fa-spin me-2"></i>Creating...');
        btn.prop('disabled', true);
        
        $.ajax({
            url: '/super/settings/backup/create',
            method: 'POST',
            data: { _token: $('input[name="_token"]').val() },
            success: function(response) {
                showAlert('success', 'Backup created successfully!');
                // Refresh backup list
                location.reload();
            },
            error: function(xhr) {
                const response = xhr.responseJSON;
                showAlert('error', response.message || 'Failed to create backup');
            },
            complete: function() {
                btn.html(originalText);
                btn.prop('disabled', false);
            }
        });
    }
}

function restoreBackup() {
    const fileInput = document.getElementById('backupFile');
    if (!fileInput.files.length) {
        showAlert('error', 'Please select a backup file first');
        return;
    }
    
    if (confirm('Are you sure you want to restore from backup? This will overwrite your current data.')) {
        const btn = $('button[onclick="restoreBackup()"]');
        const originalText = btn.html();
        btn.html('<i class="fas fa-spinner fa-spin me-2"></i>Restoring...');
        btn.prop('disabled', true);
        
        const formData = new FormData();
        formData.append('backup_file', fileInput.files[0]);
        formData.append('_token', $('input[name="_token"]').val());
        
        $.ajax({
            url: '/super/settings/backup/restore',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                showAlert('success', 'Backup restored successfully!');
                setTimeout(function() {
                    location.reload();
                }, 2000);
            },
            error: function(xhr) {
                const response = xhr.responseJSON;
                showAlert('error', response.message || 'Failed to restore backup');
            },
            complete: function() {
                btn.html(originalText);
                btn.prop('disabled', false);
            }
        });
    }
}
</script>

@include('super.includes.footer')

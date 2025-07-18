<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics - PADS Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="/dynamic-css" rel="stylesheet">
</head>
<body>
    @include('super.includes.header')
    
    <div class="container-fluid">
        <div class="row">
            @include('super.includes.sidebar')
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Reports Analytics</h1>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Analytics Dashboard</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fas fa-chart-bar fa-3x text-primary mb-3"></i>
                                                <h5 class="card-title">Total Reports</h5>
                                                <p class="card-text display-4">1,234</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fas fa-school fa-3x text-success mb-3"></i>
                                                <h5 class="card-title">Schools Reached</h5>
                                                <p class="card-text display-4">567</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fas fa-truck fa-3x text-warning mb-3"></i>
                                                <h5 class="card-title">Deliveries</h5>
                                                <p class="card-text display-4">890</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fas fa-users fa-3x text-info mb-3"></i>
                                                <h5 class="card-title">Students Served</h5>
                                                <p class="card-text display-4">45,678</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="card-title">Monthly Distribution Trends</h6>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="trendsChart" width="400" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="card-title">Distribution by District</h6>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="districtChart" width="400" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="card-title">School Type Distribution</h6>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="schoolTypeChart" width="400" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    @include('super.includes.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Trends Chart
        const trendsCtx = document.getElementById('trendsChart').getContext('2d');
        const trendsChart = new Chart(trendsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Deliveries',
                    data: [65, 59, 80, 81, 56, 55, 40, 65, 78, 89, 95, 105],
                    borderColor: '#1f8df4',
                    backgroundColor: 'rgba(31, 141, 244, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        // District Chart
        const districtCtx = document.getElementById('districtChart').getContext('2d');
        const districtChart = new Chart(districtCtx, {
            type: 'doughnut',
            data: {
                labels: ['District A', 'District B', 'District C', 'District D'],
                datasets: [{
                    data: [300, 250, 200, 150],
                    backgroundColor: ['#1f8df4', '#043249', '#28a745', '#ffc107']
                }]
            },
            options: {
                responsive: true
            }
        });
        
        // School Type Chart
        const schoolTypeCtx = document.getElementById('schoolTypeChart').getContext('2d');
        const schoolTypeChart = new Chart(schoolTypeCtx, {
            type: 'bar',
            data: {
                labels: ['Primary', 'Secondary', 'High School'],
                datasets: [{
                    label: 'Schools',
                    data: [400, 300, 200],
                    backgroundColor: ['#1f8df4', '#043249', '#28a745']
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

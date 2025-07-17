<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents - PADS Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ url('/dynamic-css') }}" rel="stylesheet">
    <style>
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo-container img {
            max-width: 150px;
            height: auto;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: linear-gradient(135deg, #1f8df4 0%, #043249 100%);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar .nav-link {
            color: #ffffff;
            padding: 15px 20px;
            border-radius: 0;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover {
            background: rgba(31, 141, 244, 0.2);
            color: #ffffff;
        }
        .sidebar .nav-link.active {
            background: var(--primary-color);
            color: #ffffff;
        }
        .sidebar-header {
            padding: 20px;
            background: linear-gradient(135deg, #043249 0%, #1f8df4 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .sidebar-header h4 {
            color: #ffffff;
            margin: 0;
        }
        .top-header {
            background: linear-gradient(135deg, #1f8df4 0%, #043249 100%);
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            color: #ffffff;
        }
        .top-header .text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
        }
        
        .global-search-input {
            background: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            color: #ffffff !important;
        }
        
        .global-search-input::placeholder {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        
        .global-search-input:focus {
            background: rgba(255, 255, 255, 0.2) !important;
            border-color: rgba(255, 255, 255, 0.5) !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25) !important;
            color: #ffffff !important;
        }
        
        .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.3) !important;
            color: #ffffff !important;
        }
        
        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            border-color: rgba(255, 255, 255, 0.5) !important;
        }
        
        .breadcrumb-item a {
            color: #ffffff;
            text-decoration: none;
        }
        .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .upload-zone {
            border: 2px dashed var(--primary-color);
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            background: rgba(31, 141, 244, 0.05);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .upload-zone:hover {
            background: rgba(31, 141, 244, 0.1);
            border-color: var(--secondary-color);
        }
        
        .upload-zone.dragover {
            background: rgba(31, 141, 244, 0.2);
            border-color: var(--secondary-color);
        }
        
        .document-item {
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .document-item:hover {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transform: translateY(-1px);
        }
        
        .document-icon {
            font-size: 2rem;
            margin-right: 15px;
        }
        
        .document-icon.pdf {
            color: #dc3545;
        }
        
        .document-icon.image {
            color: #28a745;
        }
        
        .document-icon.doc {
            color: #007bff;
        }
        
        .document-icon.default {
            color: #6c757d;
        }
        
        .document-info h6 {
            margin: 0 0 5px 0;
            color: var(--secondary-color);
        }
        
        .document-info p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }
        
        .document-actions {
            display: flex;
            gap: 10px;
        }
        
        .filter-tabs {
            margin-bottom: 20px;
        }
        
        .filter-tabs .nav-link {
            color: var(--secondary-color);
            border-color: #dee2e6;
        }
        
        .filter-tabs .nav-link.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .stats-card {
            background: linear-gradient(135deg, rgba(31, 141, 244, 0.1), rgba(4, 50, 73, 0.1));
            border: 1px solid rgba(31, 141, 244, 0.2);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
        
        .stats-card h3 {
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .stats-card p {
            color: var(--secondary-color);
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <img src="{{ asset('assets/logos/logo.png') }}" alt="PADS Logo" onerror="this.style.display='none'">
                    <h4>PADS Admin</h4>
                </div>
            </div>
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('schools.index') }}">
                        <i class="fas fa-school me-2"></i>
                        Schools
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('deliveries.index') }}">
                        <i class="fas fa-shipping-fast me-2"></i>
                        Deliveries
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reports.index') }}">
                        <i class="fas fa-chart-bar me-2"></i>
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('calendar.index') }}">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Calendar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('documents.index') }}">
                        <i class="fas fa-file-alt me-2"></i>
                        Documents
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('settings.index') }}">
                        <i class="fas fa-cog me-2"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </nav>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Header -->
            <div class="top-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Documents</li>
                            </ol>
                        </nav>
                    </div>
                    
                    <!-- Search Bar -->
                    <div class="d-flex align-items-center">
                        <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control global-search-input" placeholder="Search documents..." id="globalSearch">
                            <button class="btn btn-outline-light" type="button" onclick="performGlobalSearch()">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="text-muted">
                        <i class="fas fa-calendar-alt me-2"></i>
                        <?php echo date('F j, Y'); ?>
                    </div>
                </div>
            </div>
            
            <!-- Document Statistics -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="stats-card">
                        <h3 id="totalDocs">12</h3>
                        <p>Total Documents</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <h3 id="podCount">8</h3>
                        <p>POD Files</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <h3 id="invoiceCount">3</h3>
                        <p>Invoices</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <h3 id="otherCount">1</h3>
                        <p>Other Files</p>
                    </div>
                </div>
            </div>
            
            <!-- Upload Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-upload me-2"></i>Upload Documents
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="upload-zone" onclick="document.getElementById('fileInput').click()" ondrop="handleDrop(event)" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                                <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                <h5>Drag & Drop files here or click to browse</h5>
                                <p class="text-muted">Supported formats: PDF, DOC, DOCX, JPG, PNG, GIF (Max 10MB)</p>
                                <input type="file" id="fileInput" style="display: none;" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif" onchange="handleFileSelect(event)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Filter Tabs -->
            <div class="filter-tabs">
                <ul class="nav nav-tabs" id="documentTabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#all" data-filter="all" onclick="filterDocuments('all')">All Documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pod" data-filter="pod" onclick="filterDocuments('pod')">POD Files</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#invoice" data-filter="invoice" onclick="filterDocuments('invoice')">Invoices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#other" data-filter="other" onclick="filterDocuments('other')">Other</a>
                    </li>
                </ul>
            </div>
            
            <!-- Documents List -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-folder me-2"></i>Document Library
                            </h5>
                        </div>
                        <div class="card-body">
                            <div id="documentsList">
                                <!-- Documents will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Sample document data
        const documents = [
            {
                id: 1,
                name: 'POD_ORD-2024-001.pdf',
                type: 'pod',
                size: '2.3 MB',
                uploadDate: '2024-01-15',
                orderNumber: 'ORD-2024-001',
                school: 'Sunrise Elementary',
                extension: 'pdf'
            },
            {
                id: 2,
                name: 'POD_ORD-2024-002.pdf',
                type: 'pod',
                size: '1.8 MB',
                uploadDate: '2024-01-18',
                orderNumber: 'ORD-2024-002',
                school: 'Westfield High School',
                extension: 'pdf'
            },
            {
                id: 3,
                name: 'Invoice_INV-2024-001.pdf',
                type: 'invoice',
                size: '1.2 MB',
                uploadDate: '2024-01-20',
                orderNumber: 'ORD-2024-001',
                school: 'Sunrise Elementary',
                extension: 'pdf'
            },
            {
                id: 4,
                name: 'Delivery_Receipt_TRK003.jpg',
                type: 'pod',
                size: '856 KB',
                uploadDate: '2024-01-22',
                orderNumber: 'TRK003',
                school: 'Central Middle School',
                extension: 'jpg'
            },
            {
                id: 5,
                name: 'School_Contract_Westfield.docx',
                type: 'other',
                size: '524 KB',
                uploadDate: '2024-01-25',
                orderNumber: '',
                school: 'Westfield High School',
                extension: 'docx'
            }
        ];
        
        let currentFilter = 'all';
        
        function getFileIcon(extension) {
            switch(extension.toLowerCase()) {
                case 'pdf': return '<i class="fas fa-file-pdf document-icon pdf"></i>';
                case 'doc': 
                case 'docx': return '<i class="fas fa-file-word document-icon doc"></i>';
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif': return '<i class="fas fa-file-image document-icon image"></i>';
                default: return '<i class="fas fa-file document-icon default"></i>';
            }
        }
        
        function displayDocuments(docs) {
            const documentsList = document.getElementById('documentsList');
            
            if (docs.length === 0) {
                documentsList.innerHTML = '<div class="text-center py-4"><p class="text-muted">No documents found.</p></div>';
                return;
            }
            
            documentsList.innerHTML = docs.map(doc => `
                <div class="document-item d-flex align-items-center">
                    ${getFileIcon(doc.extension)}
                    <div class="document-info flex-grow-1">
                        <h6>${doc.name}</h6>
                        <p><strong>Type:</strong> ${doc.type.toUpperCase()} | <strong>Size:</strong> ${doc.size} | <strong>Uploaded:</strong> ${doc.uploadDate}</p>
                        ${doc.orderNumber ? `<p><strong>Order:</strong> ${doc.orderNumber} | <strong>School:</strong> ${doc.school}</p>` : `<p><strong>School:</strong> ${doc.school}</p>`}
                    </div>
                    <div class="document-actions">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewDocument(${doc.id})">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-sm btn-primary" onclick="downloadDocument(${doc.id})">
                            <i class="fas fa-download"></i> Download
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteDocument(${doc.id})">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            `).join('');
        }
        
        function filterDocuments(type) {
            currentFilter = type;
            
            // Update active tab
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector(`[data-filter="${type}"]`).classList.add('active');
            
            // Filter documents
            const filteredDocs = type === 'all' ? documents : documents.filter(doc => doc.type === type);
            displayDocuments(filteredDocs);
        }
        
        function searchDocuments(searchTerm) {
            const filteredDocs = documents.filter(doc => {
                const matchesSearch = doc.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                                    doc.orderNumber.toLowerCase().includes(searchTerm.toLowerCase()) ||
                                    doc.school.toLowerCase().includes(searchTerm.toLowerCase());
                
                const matchesFilter = currentFilter === 'all' || doc.type === currentFilter;
                
                return matchesSearch && matchesFilter;
            });
            
            displayDocuments(filteredDocs);
        }
        
        function handleFileSelect(event) {
            const files = event.target.files;
            processFiles(files);
        }
        
        function handleDragOver(event) {
            event.preventDefault();
            document.querySelector('.upload-zone').classList.add('dragover');
        }
        
        function handleDragLeave(event) {
            event.preventDefault();
            document.querySelector('.upload-zone').classList.remove('dragover');
        }
        
        function handleDrop(event) {
            event.preventDefault();
            document.querySelector('.upload-zone').classList.remove('dragover');
            const files = event.dataTransfer.files;
            processFiles(files);
        }
        
        function processFiles(files) {
            for (let file of files) {
                if (file.size > 10 * 1024 * 1024) { // 10MB limit
                    alert(`File ${file.name} is too large. Maximum size is 10MB.`);
                    continue;
                }
                
                // Simulate file upload
                uploadFile(file);
            }
        }
        
        function uploadFile(file) {
            // Simulate upload progress
            const fileName = file.name;
            const fileSize = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
            
            // For demo purposes, we'll just show a success message
            alert(`File "${fileName}" (${fileSize}) uploaded successfully!`);
            
            // In a real application, you would send the file to the server here
            // and then refresh the documents list
        }
        
        function viewDocument(id) {
            const doc = documents.find(d => d.id === id);
            if (doc) {
                alert(`Viewing document: ${doc.name}`);
                // In a real application, you would open the document viewer
            }
        }
        
        function downloadDocument(id) {
            const doc = documents.find(d => d.id === id);
            if (doc) {
                alert(`Downloading document: ${doc.name}`);
                // In a real application, you would trigger the download
            }
        }
        
        function deleteDocument(id) {
            const doc = documents.find(d => d.id === id);
            if (doc && confirm(`Are you sure you want to delete "${doc.name}"?`)) {
                alert(`Document "${doc.name}" has been deleted.`);
                // In a real application, you would delete the document and refresh the list
            }
        }
        
        function performGlobalSearch() {
            const searchTerm = document.getElementById('globalSearch').value.trim();
            
            if (searchTerm === '') {
                // Show all documents for current filter
                filterDocuments(currentFilter);
                return;
            }
            
            // Search in documents
            searchDocuments(searchTerm);
        }
        
        // Handle Enter key press in search input
        document.getElementById('globalSearch').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                performGlobalSearch();
            }
        });
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            displayDocuments(documents);
        });
        
        // Set active nav item
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.classList.remove('active');
        });
        const activeLink = document.querySelector('.sidebar .nav-link[href="{{ route('documents.index') }}"]');
        if (activeLink) {
            activeLink.classList.add('active');
        }
    </script>
</body>
</html>

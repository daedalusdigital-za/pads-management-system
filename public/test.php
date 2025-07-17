<!DOCTYPE html>
<html>
<head>
    <title>PADS Management System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center; }
        h1 { color: #1f8df4; margin-bottom: 10px; }
        .subtitle { color: #666; margin-bottom: 30px; }
        .links { margin-top: 30px; }
        .links a { 
            display: inline-block; 
            margin: 10px; 
            padding: 15px 25px; 
            background: linear-gradient(135deg, #1f8df4 0%, #043249 100%); 
            color: white; 
            text-decoration: none; 
            border-radius: 8px; 
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .links a:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 4px 15px rgba(31, 141, 244, 0.4);
        }
        .status { 
            background: #e8f5e8; 
            color: #2d5a2d; 
            padding: 10px 20px; 
            border-radius: 20px; 
            display: inline-block; 
            margin: 20px 0; 
            font-size: 14px;
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .feature {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: left;
        }
        .feature h3 {
            color: #1f8df4;
            margin-bottom: 10px;
        }
        .feature p {
            margin: 0;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎯 PADS Management System</h1>
        <p class="subtitle">Pad Distribution System - Management Platform</p>
        
        <div class="status">✅ System Online</div>
        
        <div class="links">
            <a href="dashboard.php">📊 Dashboard</a>
            <a href="schools.php">🏫 Schools</a>
            <a href="deliveries.php">🚚 Deliveries</a>
            <a href="calendar.php">📅 Calendar</a>
            <a href="documents.php">📄 Documents</a>
        </div>
        
        <div class="features">
            <div class="feature">
                <h3>🗺️ Google Maps Tracking</h3>
                <p>Real-time order tracking with Google Maps integration and delivery route optimization.</p>
            </div>
            <div class="feature">
                <h3>🎨 Modern UI</h3>
                <p>Beautiful gradient themes with responsive design and smooth animations.</p>
            </div>
            <div class="feature">
                <h3>🔍 Smart Search</h3>
                <p>Global search functionality across orders, schools, and deliveries.</p>
            </div>
            <div class="feature">
                <h3>📋 Document Management</h3>
                <p>Upload, organize, and manage PODs (Proof of Delivery) and other documents.</p>
            </div>
        </div>
        
        <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee; color: #666; font-size: 12px;">
            <p>PADS Management System v1.0 | PHP <?php echo PHP_VERSION; ?> | Server: <?php echo $_SERVER['SERVER_NAME']; ?>:<?php echo $_SERVER['SERVER_PORT']; ?></p>
        </div>
    </div>
</body>
</html>

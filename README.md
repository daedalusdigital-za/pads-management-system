# 🎯 PADS Management System

A comprehensive **Pad Distribution System** built with Laravel, featuring modern UI design, Google Maps integration, and advanced document management capabilities.

## 📋 Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Contributing](#contributing)
- [License](#license)

## ✨ Features

### 🗺️ **Google Maps Integration**
- Real-time order tracking with Google Maps
- Delivery route optimization
- Interactive map with markers and clustering
- Location-based school management

### 🎨 **Modern UI Design**
- Beautiful gradient themes (Blue to Dark Blue)
- Responsive Bootstrap 5 layout
- Smooth animations and transitions
- Mobile-friendly interface

### 🔍 **Advanced Search System**
- Global search functionality
- Context-aware search routing
- Real-time search suggestions
- Search across orders, schools, and deliveries

### 📅 **Calendar Integration**
- Interactive delivery scheduling
- Calendar view with delivery tracking
- Event management system
- Date-based filtering

### 📄 **Document Management**
- Upload and manage POD (Proof of Delivery) files
- Drag & drop file uploads
- Document categorization (POD, Invoices, Other)
- File type validation and size limits
- Download and view capabilities

### 📊 **Dashboard & Analytics**
- Real-time statistics dashboard
- Quick action buttons
- Performance metrics
- Visual data representation

### 🏫 **School Management**
- Comprehensive school database
- School information management
- Delivery tracking per school
- Contact management

### 🚚 **Delivery System**
- Order tracking with unique IDs
- Delivery status management
- Route optimization
- Timeline tracking

## 🛠️ Tech Stack

- **Backend**: Laravel 11 (PHP 8.3+)
- **Frontend**: Bootstrap 5, Font Awesome, jQuery
- **Database**: SQLite (configurable)
- **Maps**: Google Maps API
- **File Processing**: Maatwebsite/Excel
- **Styling**: CSS3 with Gradient Themes

## 📦 Installation

### Prerequisites
- PHP 8.3 or higher
- Composer
- Node.js (optional, for asset compilation)

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/pads-management-system.git
   cd pads-management-system
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```

5. **Start the development server**
   ```bash
   php artisan serve
   ```

   Or use the built-in PHP server:
   ```bash
   cd public && php -S localhost:8081
   ```

## 🚀 Usage

### Accessing the System
- **Main Dashboard**: `http://localhost:8081/super/dashboard`
- **Schools Management**: `http://localhost:8081/super/schools`
- **Delivery Tracking**: `http://localhost:8081/super/deliveries`
- **Document Management**: `http://localhost:8081/super/documents`
- **Calendar View**: `http://localhost:8081/super/calendar`

### Key Functionalities

#### 🔍 **Search System**
- Use the global search bar to find orders, schools, or deliveries
- Try search terms like "ORD-2025-001" or school names

#### 📍 **Order Tracking**
- Enter order numbers like "ORD-2025-001", "ORD-2025-002", "TRK001"
- View real-time delivery status and location

#### 📁 **Document Upload**
- Drag and drop files or click to browse
- Supports PDF, DOC, DOCX, JPG, PNG, GIF
- Maximum file size: 10MB

## 📁 Project Structure

```
pads-web-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── Providers/
├── resources/
│   └── views/
│       └── super/
│           ├── dashboard.blade.php
│           ├── schools/
│           ├── deliveries/
│           ├── documents/
│           └── calendar/
├── routes/
│   └── web.php
├── database/
│   └── migrations/
└── public/
    └── assets/
```

## 🎨 Design Features

### Color Scheme
- **Primary**: #1f8df4 (Blue)
- **Secondary**: #043249 (Dark Blue)
- **Gradients**: Linear gradients throughout the interface

### Components
- Responsive sidebar navigation
- Interactive cards and buttons
- Smooth hover effects
- Professional typography

## 📱 Responsive Design

The system is fully responsive and works on:
- 📱 Mobile devices
- 📱 Tablets
- 💻 Desktop computers
- 🖥️ Large screens

## 🧪 Testing

Sample data is included for testing:
- **Orders**: ORD-2025-001, ORD-2025-002, ORD-2025-003
- **Schools**: Various sample schools with different locations
- **Documents**: Sample POD files and invoices

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- Laravel Framework for the robust backend
- Bootstrap for the responsive UI components
- Google Maps API for location services
- Font Awesome for the icon library

## 📞 Support

For support or questions, please contact the development team or open an issue in the GitHub repository.

---

**Built with ❤️ for efficient pad distribution management**

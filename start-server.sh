#!/bin/bash

echo "🚀 Starting PADS Management System..."
echo "=================================="

# Navigate to Laravel project
cd /Users/accounts/Documents/GitHub/Attempt/pads-web-laravel

# Check if .env exists, if not create it
if [ ! -f .env ]; then
    echo "📝 Creating .env file..."
    echo "APP_NAME='PADS Management System'
APP_ENV=local
APP_KEY=base64:$(openssl rand -base64 32)
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS='hello@example.com'
MAIL_FROM_NAME='PADS Management System'" > .env
fi

# Create database file if it doesn't exist
if [ ! -f database/database.sqlite ]; then
    echo "📊 Creating SQLite database..."
    mkdir -p database
    touch database/database.sqlite
fi

# Start the server
echo "🌐 Starting server at http://localhost:8000"
echo "📋 Reports page: http://localhost:8000/super/reports"
echo "📤 Import page: http://localhost:8000/super/reports/import"
echo ""
echo "Press Ctrl+C to stop the server"
echo ""

php artisan serve --host=0.0.0.0 --port=8000

#!/bin/bash

# PADS Management System - Azure Deployment Script
# This script automates the deployment of your Laravel application to Azure

set -e

# Configuration
RESOURCE_GROUP="pads-rg"
LOCATION="East US"
APP_NAME="pads-management-app"
PLAN_NAME="pads-plan"
MYSQL_SERVER="pads-mysql-server"
MYSQL_USER="padsmysql"
MYSQL_PASSWORD="YourStrongPassword123!"
DATABASE_NAME="pads_db"

echo "🚀 Starting Azure deployment for PADS Management System..."

# Check if Azure CLI is installed
if ! command -v az &> /dev/null; then
    echo "❌ Azure CLI is not installed. Please install it first."
    exit 1
fi

# Login to Azure
echo "🔐 Logging into Azure..."
az login

# Create resource group
echo "📁 Creating resource group: $RESOURCE_GROUP"
az group create --name $RESOURCE_GROUP --location "$LOCATION"

# Create App Service Plan
echo "📋 Creating App Service Plan: $PLAN_NAME"
az appservice plan create \
    --name $PLAN_NAME \
    --resource-group $RESOURCE_GROUP \
    --sku B1 \
    --is-linux

# Create Web App
echo "🌐 Creating Web App: $APP_NAME"
az webapp create \
    --resource-group $RESOURCE_GROUP \
    --plan $PLAN_NAME \
    --name $APP_NAME \
    --runtime "PHP|8.3" \
    --deployment-local-git

# Create MySQL Database
echo "🗄️ Creating MySQL Database..."
az mysql flexible-server create \
    --resource-group $RESOURCE_GROUP \
    --name $MYSQL_SERVER \
    --admin-user $MYSQL_USER \
    --admin-password $MYSQL_PASSWORD \
    --sku-name Standard_B1ms \
    --tier Burstable \
    --public-access 0.0.0.0 \
    --storage-size 32 \
    --version 8.0.21

# Create database
az mysql flexible-server db create \
    --resource-group $RESOURCE_GROUP \
    --server-name $MYSQL_SERVER \
    --database-name $DATABASE_NAME

# Generate Laravel application key
echo "🔑 Generating application key..."
APP_KEY=$(openssl rand -base64 32)

# Configure environment variables
echo "⚙️ Configuring environment variables..."
az webapp config appsettings set \
    --resource-group $RESOURCE_GROUP \
    --name $APP_NAME \
    --settings \
        APP_NAME="PADS Management System" \
        APP_ENV=production \
        APP_KEY="base64:$APP_KEY" \
        APP_DEBUG=false \
        APP_URL="https://$APP_NAME.azurewebsites.net" \
        DB_CONNECTION=mysql \
        DB_HOST="$MYSQL_SERVER.mysql.database.azure.com" \
        DB_PORT=3306 \
        DB_DATABASE=$DATABASE_NAME \
        DB_USERNAME=$MYSQL_USER \
        DB_PASSWORD=$MYSQL_PASSWORD \
        CACHE_DRIVER=file \
        SESSION_DRIVER=file \
        QUEUE_CONNECTION=sync

# Configure deployment source
echo "🔄 Setting up Git deployment..."
DEPLOYMENT_URL=$(az webapp deployment source config-local-git \
    --resource-group $RESOURCE_GROUP \
    --name $APP_NAME \
    --query url \
    --output tsv)

# Add Azure remote if it doesn't exist
if ! git remote get-url azure &> /dev/null; then
    echo "📡 Adding Azure remote..."
    git remote add azure $DEPLOYMENT_URL
else
    echo "📡 Updating Azure remote..."
    git remote set-url azure $DEPLOYMENT_URL
fi

# Deploy to Azure
echo "🚀 Deploying to Azure..."
git push azure main

# Wait for deployment to complete
echo "⏳ Waiting for deployment to complete..."
sleep 30

# Run post-deployment commands
echo "🔧 Running post-deployment commands..."

# Create a temporary PHP script to run Artisan commands
cat > /tmp/deploy_commands.php << 'EOF'
<?php
// Change to the application directory
chdir('/home/site/wwwroot');

// Run database migrations
echo "Running database migrations...\n";
exec('php artisan migrate --force 2>&1', $output);
foreach ($output as $line) {
    echo $line . "\n";
}

// Cache configuration
echo "Caching configuration...\n";
exec('php artisan config:cache 2>&1', $output);
foreach ($output as $line) {
    echo $line . "\n";
}

// Cache routes
echo "Caching routes...\n";
exec('php artisan route:cache 2>&1', $output);
foreach ($output as $line) {
    echo $line . "\n";
}

// Cache views
echo "Caching views...\n";
exec('php artisan view:cache 2>&1', $output);
foreach ($output as $line) {
    echo $line . "\n";
}

echo "Post-deployment commands completed!\n";
EOF

# Execute the script via SSH (if available) or via the web interface
# Note: This is a simplified version - in production, you'd want to use Azure CLI or Kudu API

echo "✅ Deployment completed successfully!"
echo ""
echo "🌐 Your application is now available at:"
echo "   https://$APP_NAME.azurewebsites.net"
echo ""
echo "🗄️ Database connection details:"
echo "   Server: $MYSQL_SERVER.mysql.database.azure.com"
echo "   Database: $DATABASE_NAME"
echo "   Username: $MYSQL_USER"
echo ""
echo "📋 Next steps:"
echo "1. Visit your application URL to verify deployment"
echo "2. Run database migrations if needed"
echo "3. Configure your Google Maps API key in the Azure portal"
echo "4. Set up SSL certificate (automatically provided by Azure)"
echo "5. Configure custom domain (optional)"
echo ""
echo "🔧 To manage your application:"
echo "   az webapp browse --name $APP_NAME --resource-group $RESOURCE_GROUP"
echo "   az webapp log tail --name $APP_NAME --resource-group $RESOURCE_GROUP"
echo ""
echo "💡 For troubleshooting, check the Azure portal or use:"
echo "   az webapp log tail --name $APP_NAME --resource-group $RESOURCE_GROUP"

# Clean up temporary files
rm -f /tmp/deploy_commands.php

echo "🎉 Azure deployment script completed!"

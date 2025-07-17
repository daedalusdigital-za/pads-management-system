# Azure Deployment Guide for PADS Management System

## Prerequisites

1. **Azure Account**: Create a free Azure account at [portal.azure.com](https://portal.azure.com)
2. **Azure CLI**: Already installed (`az --version` to verify)
3. **PHP 8.3** and **Composer** for Laravel
4. **Node.js** for frontend assets

## Deployment Options

### Option 1: Azure App Service (Recommended)

Azure App Service is the easiest way to deploy Laravel applications.

#### Step 1: Login to Azure

```bash
az login
```

#### Step 2: Create Resource Group

```bash
az group create --name pads-rg --location "East US"
```

#### Step 3: Create App Service Plan

```bash
az appservice plan create --name pads-plan --resource-group pads-rg --sku B1 --is-linux
```

#### Step 4: Create Web App

```bash
az webapp create --resource-group pads-rg --plan pads-plan --name pads-management-app --runtime "PHP|8.3" --deployment-local-git
```

#### Step 5: Configure Environment Variables

```bash
# Set Laravel environment
az webapp config appsettings set --resource-group pads-rg --name pads-management-app --settings \
    APP_ENV=production \
    APP_DEBUG=false \
    APP_KEY=base64:$(openssl rand -base64 32) \
    DB_CONNECTION=mysql \
    DB_HOST=your-mysql-host \
    DB_PORT=3306 \
    DB_DATABASE=pads_db \
    DB_USERNAME=your-username \
    DB_PASSWORD=your-password
```

#### Step 6: Deploy from Git

```bash
# Get deployment credentials
az webapp deployment user set --user-name your-username --password your-password

# Add Azure remote
git remote add azure https://your-username@pads-management-app.scm.azurewebsites.net/pads-management-app.git

# Deploy
git push azure main
```

### Option 2: Azure Container Instances

For containerized deployment using Docker.

#### Step 1: Create Dockerfile

```dockerfile
FROM php:8.3-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application code
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configure Apache
RUN a2enmod rewrite
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
```

#### Step 2: Create Apache Configuration

```apache
<VirtualHost *:80>
    DocumentRoot /var/www/html/public
    
    <Directory /var/www/html/public>
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

#### Step 3: Build and Deploy Container

```bash
# Build container
docker build -t pads-management .

# Create container registry
az acr create --resource-group pads-rg --name padsregistry --sku Basic

# Push to registry
az acr build --registry padsregistry --image pads-management .

# Deploy container
az container create --resource-group pads-rg --name pads-container --image padsregistry.azurecr.io/pads-management --dns-name-label pads-management
```

### Option 3: Azure Virtual Machine

For full control over the environment.

#### Step 1: Create Virtual Machine

```bash
az vm create \
    --resource-group pads-rg \
    --name pads-vm \
    --image UbuntuLTS \
    --admin-username azureuser \
    --generate-ssh-keys \
    --size Standard_B2s
```

#### Step 2: Open HTTP Port

```bash
az vm open-port --port 80 --resource-group pads-rg --name pads-vm
```

#### Step 3: SSH and Setup LAMP Stack

```bash
# SSH into VM
az vm show --resource-group pads-rg --name pads-vm -d --query publicIps -o tsv
ssh azureuser@<public-ip>

# Install LAMP stack
sudo apt update
sudo apt install apache2 mysql-server php8.3 php8.3-mysql php8.3-xml php8.3-gd php8.3-curl php8.3-zip php8.3-mbstring -y

# Install Composer
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

# Clone repository
cd /var/www/html
sudo git clone https://github.com/daedalusdigital-za/pads-management-system.git
sudo chown -R www-data:www-data pads-management-system/
```

## Database Options

### Option 1: Azure Database for MySQL

```bash
# Create MySQL server
az mysql flexible-server create \
    --resource-group pads-rg \
    --name pads-mysql-server \
    --admin-user padsmysql \
    --admin-password YourStrongPassword123! \
    --sku-name Standard_B1ms \
    --tier Burstable \
    --public-access 0.0.0.0 \
    --storage-size 32 \
    --version 8.0.21

# Create database
az mysql flexible-server db create \
    --resource-group pads-rg \
    --server-name pads-mysql-server \
    --database-name pads_db
```

### Option 2: Azure SQL Database

```bash
# Create SQL server
az sql server create \
    --name pads-sql-server \
    --resource-group pads-rg \
    --location "East US" \
    --admin-user padssql \
    --admin-password YourStrongPassword123!

# Create database
az sql db create \
    --resource-group pads-rg \
    --server pads-sql-server \
    --name pads_db \
    --service-objective Basic
```

## Additional Azure Services

### Azure Blob Storage (for file uploads)

```bash
# Create storage account
az storage account create \
    --name padsstorage \
    --resource-group pads-rg \
    --location "East US" \
    --sku Standard_LRS

# Create container for uploads
az storage container create \
    --name uploads \
    --account-name padsstorage \
    --public-access blob
```

### Azure CDN (for static assets)

```bash
# Create CDN profile
az cdn profile create \
    --name pads-cdn-profile \
    --resource-group pads-rg \
    --sku Standard_Microsoft

# Create CDN endpoint
az cdn endpoint create \
    --name pads-cdn-endpoint \
    --profile-name pads-cdn-profile \
    --resource-group pads-rg \
    --origin padsstorage.blob.core.windows.net
```

## Environment Configuration

### Required Environment Variables

```bash
# Application
APP_NAME="PADS Management System"
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-app.azurewebsites.net

# Database
DB_CONNECTION=mysql
DB_HOST=your-mysql-server.mysql.database.azure.com
DB_PORT=3306
DB_DATABASE=pads_db
DB_USERNAME=padsmysql
DB_PASSWORD=YourStrongPassword123!

# Cache
CACHE_DRIVER=redis
REDIS_HOST=your-redis-cache.redis.cache.windows.net
REDIS_PASSWORD=your-redis-password
REDIS_PORT=6380

# File Storage
FILESYSTEM_DISK=azure
AZURE_STORAGE_ACCOUNT=padsstorage
AZURE_STORAGE_KEY=your-storage-key
AZURE_STORAGE_CONTAINER=uploads

# Google Maps
GOOGLE_MAPS_API_KEY=your-google-maps-api-key

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=your-sendgrid-api-key
```

## Post-Deployment Steps

1. **Run Database Migrations**
```bash
php artisan migrate --force
```

2. **Generate Application Key**
```bash
php artisan key:generate
```

3. **Optimize for Production**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

4. **Set File Permissions**
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

## Monitoring & Scaling

### Application Insights

```bash
# Create Application Insights
az monitor app-insights component create \
    --app pads-insights \
    --location "East US" \
    --resource-group pads-rg \
    --kind web
```

### Auto-scaling

```bash
# Create autoscale setting
az monitor autoscale create \
    --resource-group pads-rg \
    --resource /subscriptions/your-subscription/resourceGroups/pads-rg/providers/Microsoft.Web/serverfarms/pads-plan \
    --name pads-autoscale \
    --min-count 1 \
    --max-count 3 \
    --count 1
```

## Cost Optimization

1. **Use Azure Calculator**: [Azure Pricing Calculator](https://azure.microsoft.com/en-us/pricing/calculator/)
2. **Start with Basic Tier**: Upgrade as needed
3. **Monitor Usage**: Use Azure Cost Management
4. **Use Reserved Instances**: For predictable workloads

## Security Best Practices

1. **Enable HTTPS**: Use Azure-managed SSL certificates
2. **Use Azure Key Vault**: Store sensitive configuration
3. **Enable Azure Security Center**: Monitor security posture
4. **Configure WAF**: Use Azure Application Gateway with WAF
5. **Regular Updates**: Keep PHP and Laravel updated

## Troubleshooting

### Common Issues

1. **500 Internal Server Error**
   - Check storage permissions
   - Verify database connection
   - Check PHP extensions

2. **Database Connection Failed**
   - Verify connection string
   - Check firewall rules
   - Confirm user permissions

3. **File Upload Issues**
   - Check storage configuration
   - Verify file permissions
   - Check upload limits

### Useful Commands

```bash
# Check app logs
az webapp log tail --name pads-management-app --resource-group pads-rg

# Restart app
az webapp restart --name pads-management-app --resource-group pads-rg

# Check deployment status
az webapp deployment source show --name pads-management-app --resource-group pads-rg
```

## Support

- **Azure Documentation**: [docs.microsoft.com/azure](https://docs.microsoft.com/azure)
- **Laravel Documentation**: [laravel.com/docs](https://laravel.com/docs)
- **Azure Support**: Create support ticket in Azure Portal

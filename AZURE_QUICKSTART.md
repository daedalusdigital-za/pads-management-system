# Quick Azure Deployment Guide

## 🚀 Deploy Your PADS Management System to Azure in 5 Steps

### Step 1: Prerequisites
- Azure account (free tier available)
- Azure CLI installed ✅
- Your Laravel app ready ✅

### Step 2: Login to Azure
```bash
az login
```

### Step 3: Run the Automated Deployment Script
```bash
./deploy-azure.sh
```

### Step 4: Configure Your Environment
After deployment, add these settings in the Azure Portal:

1. Go to your App Service → Configuration → Application Settings
2. Add your Google Maps API key:
   ```
   GOOGLE_MAPS_API_KEY = your_actual_api_key_here
   ```

### Step 5: Access Your App
Your app will be available at: `https://pads-management-app.azurewebsites.net`

---

## 📦 What Gets Deployed

✅ **PHP 8.3 Web App** - Your Laravel application  
✅ **MySQL Database** - For your data storage  
✅ **Auto-scaling** - Handles traffic spikes  
✅ **SSL Certificate** - Automatic HTTPS  
✅ **Git Deployment** - Easy updates  

---

## 💰 Estimated Monthly Cost

- **Basic Plan**: ~$13/month
- **Standard Plan**: ~$56/month (recommended for production)
- **Premium Plan**: ~$112/month (high traffic)

*Includes: Web App + Database + Storage*

---

## 🔧 Quick Commands

```bash
# Check deployment status
az webapp browse --name pads-management-app --resource-group pads-rg

# View logs
az webapp log tail --name pads-management-app --resource-group pads-rg

# Restart app
az webapp restart --name pads-management-app --resource-group pads-rg

# Update from GitHub
git push azure main
```

---

## 🛠️ Manual Deployment (Alternative)

If you prefer manual setup:

1. **Create Resource Group**
   ```bash
   az group create --name pads-rg --location "East US"
   ```

2. **Create App Service**
   ```bash
   az webapp create --resource-group pads-rg --plan pads-plan --name pads-management-app --runtime "PHP|8.3"
   ```

3. **Deploy Code**
   ```bash
   az webapp deployment source config --name pads-management-app --resource-group pads-rg --repo-url https://github.com/daedalusdigital-za/pads-management-system --branch main
   ```

---

## 🔐 Security Features

- **Automatic SSL/TLS certificates**
- **Azure Active Directory integration**
- **DDoS protection**
- **Web Application Firewall (WAF)**
- **Managed identity for secure database access**

---

## 📊 Monitoring

Azure provides built-in monitoring:
- **Application Insights** - Performance monitoring
- **Log Analytics** - Detailed logging
- **Alerts** - Automated notifications
- **Auto-scaling** - Based on CPU/memory usage

---

## 🆘 Support

- **Azure Documentation**: [docs.microsoft.com/azure](https://docs.microsoft.com/azure)
- **Laravel on Azure**: [docs.microsoft.com/azure/app-service/quickstart-php](https://docs.microsoft.com/azure/app-service/quickstart-php)
- **Azure Support**: Available 24/7 through Azure Portal

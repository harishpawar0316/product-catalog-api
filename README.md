# Product Catalog API

This is a RESTful API built with Laravel for managing a product catalog. It allows you to perform CRUD operations on products and categories, with features like search, and rate limiting.

---

## **Features**

- **Product Management**:
  - Create, read, update, and delete products.
  - Filter products by category or search by name/description.
- **Category Management**:
  - Retrieve categories in a nested structure (parent-child relationships).
- **Search Functionality**:
  - Search products by name or description.
- **Rate Limiting**:
  - Prevent API abuse with rate limiting (60 requests per minute).

---

## **Requirements**

- PHP 8.1 or higher
- Composer
- MySQL or any supported database
- Laravel 10.x

---

## **Setup Instructions**

### **Step 1: Clone the Repository**
1. Clone the repository to your local machine:

   git clone https://github.com/harishpawar0316/product-catalog-api.git
   cd product-catalog-api

### **Step 2: Install Dependencies**
1. Install PHP dependencies using Composer:

    composer install

### **Step 3: Configure Environment**
1. Copy the .env.example file to .env:

    cp .env.example .env

2. Update the .env file with your database credentials:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=product_catalog
    DB_USERNAME=root
    DB_PASSWORD=

### **Step 4: Generate Application Key**
1. Generate the Laravel application key:

    php artisan key:generate

### **Step 5: Run Migrations**
1. Run database migrations to create the necessary tables:

    php artisan migrate

### **Step 6: Seed Database (Optional)**
1. Run database migrations to create the necessary tables:

    php artisan db:seed

### **Step 7: Start the Development Server**
1. Start the Laravel development server:

    php artisan serve

### **Step 7: Access the API**
1. The API will be available at http://localhost:8000/api/v1.
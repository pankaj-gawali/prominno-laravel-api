# Prominno Laravel API Project

This is a Laravel 12 based REST API project developed as an assignment.
The project contains Admin and Seller modules with authentication,
product management, multiple brands per product, and PDF generation.

---

## Tech Stack
- Laravel 12
- MySQL
- Laravel Sanctum (API Authentication)
- DomPDF (PDF Generation)
- Postman

---

## Project Setup

1. Install dependencies
composer install


2. Create `.env` file and configure database
DB_DATABASE=prominno
DB_USERNAME=root
DB_PASSWORD=

3. Generate application key
php artisan key:generate


4. Run migrations
php artisan migrate



5. Import database SQL file
database/prominno.sql



6. Create storage link for image access
php artisan storage:link


7. Start the application
php artisan serve



## Admin Credentials
Email: admin@prominno.com
Password: admin123



## Postman Collection
Postman collection file is included in the project root:
prominno-postman.json



## Database
Database SQL file is included:
database/prominno.sql



## Implemented Features
- Admin Login API
- Create Seller API
- Seller Listing with Pagination
- Seller Login API
- Add Product with Multiple Brands
- Seller-wise Product Listing
- Product Delete (Owner Only)
- Product PDF View with Total Price
- Role Based Authentication

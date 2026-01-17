# Prominno Laravel API Project

This is a Laravel 12 based REST API project developed as an assignment.
The project contains Admin and Seller modules with authentication,
product management, multiple brands per product, and PDF generation.

This is a Laravel 12 REST API project developed as part of an interview task.


---

## Tech Stack
- Laravel 12
- MySQL
- Laravel Sanctum (API Authentication)
- DomPDF (PDF Generation)
- Postman

---
## Features

### Admin APIs
- Admin Login (Token-based authentication)
- Create Seller with validation
- List Sellers with pagination

### Seller APIs
- Seller Login (Token-based authentication)
- Add Product with multiple Brands
- Product Listing (Only logged-in seller products)
- Delete Product (Only owner seller allowed)
- View Product PDF

### Product PDF Includes
- Product Name
- Product Description
- Brand Name
- Brand Image
- Brand Price
- Total Price (sum of all brand prices)

## Tech Stack
- Laravel 12
- Sanctum Authentication
- MySQL
- DomPDF
- Postman

## Setup Instructions

1. Clone repository
2. Run `composer install`
3. Copy `.env.example` to `.env`
4. Configure database
5. Run migrations:
   `php artisan migrate --seed`
6. Create storage link:
   `php artisan storage:link`
7. Run server:
   `php artisan serve`

## Postman Collection
Postman collection is included:
`prominno-postman.json`

## Exception Handling
- Validation Errors: 422
- Unauthorized Access: 403
- Invalid Credentials: 401



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

## Author
Pankaj Gawali.

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| All routes here are stateless APIs
*/

Route::post('/admin/login', [AuthController::class, 'adminLogin']);
Route::post('/seller/login', [AuthController::class, 'sellerLogin']);

/*
|--------------------------------------------------------------------------
| Admin Routes (Admin Only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/admin/create-seller', [AdminController::class, 'createSeller']);
    Route::get('/admin/sellers', [AdminController::class, 'sellers']);
});

/*
|--------------------------------------------------------------------------
| Seller Routes (Seller Only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'role:seller'])->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::get('/products/{product}/pdf', [ProductController::class, 'pdf']);
});

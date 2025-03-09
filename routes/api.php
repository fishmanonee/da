<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Routes cho Authentication
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [AuthController::class, 'user']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

// Routes cho Products
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'getProducts']);  
    Route::get('/{id}', [ProductController::class, 'getProductById']);  

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [ProductController::class, 'store']);  
        Route::put('/{id}', [ProductController::class, 'update']);  
        Route::delete('/{id}', [ProductController::class, 'delete']); 
    });
});

// Routes cho Categories
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'getCategories']);
    Route::get('/{id}', [CategoryController::class, 'getCategoryById']);
    Route::get('/{id}/products', [CategoryController::class, 'getProductsByCategoryId']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [CategoryController::class, 'store']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'delete']);
    });
});

// Routes cho Users
Route::prefix('users')->middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);

// **📌 Fix Routes cho Orders**
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::put('/orders/{id}', [OrderController::class, 'update']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
});
Route::get('/orders', [OrderController::class, 'index']);

// Routes cho Payments
Route::prefix('payments')->group(function () {
    Route::get('/', [PaymentController::class, 'index']);
    Route::get('/{id}', [PaymentController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [PaymentController::class, 'store']);
        Route::put('/{id}', [PaymentController::class, 'update']);
        Route::delete('/{id}', [PaymentController::class, 'destroy']);
    });
});

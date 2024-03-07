<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MyListController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public Auth Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Public Routes
Route::get('/products', [ProductController::class, 'index_client']);
Route::get('/products/{product}', [ProductController::class, 'show_client']);

Route::get('/categories', [CategoryController::class, 'index_client']);
Route::get('/categories/{category}', [CategoryController::class, 'show_client']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    // User routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/user', [AuthController::class, 'api_user']);
    Route::put('/user', [AuthController::class, 'api_user_update']);
    Route::get('/addresses', [AuthController::class, 'api_addresses']);
    Route::put('/addresses', [AuthController::class, 'api_addresses_update']);
    Route::put('/profile', [AuthController::class, 'profile_update']);

    // Cart routes
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add/', [CartController::class, 'add']);
    Route::get('/cart/remove/{variant}', [CartController::class, 'remove']);
    Route::post('/cart/update', [CartController::class, 'update']);

    // Order routes
    Route::post('/place-order', [CheckoutController::class, 'checkout_wholesale']);
    Route::get('/orders', [OrderController::class, 'index_client']);
    Route::get('/orders/{order}', [OrderController::class, 'show_client']);
    Route::get('/orders/{order}/reorder', [CheckoutController::class, 'reorder']);

    // MyList routes
    Route::get('/mylist', [MyListController::class, 'index']);
    Route::post('/mylist/{variant}', [MyListController::class, 'add']);
    Route::delete('/mylist/{variant}', [MyListController::class, 'remove']);

});

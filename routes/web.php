<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Access views by name (for development only)
Route::get('/view/{view}', function ($view) {
    return view($view);
});

// Login & Register
Route::get('/login', [AuthController::class, 'login_form'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register_form'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Public Routes

Route::get('/', [HomeController::class, 'index']);

Route::get('/contact', function () {
    return view('app.contact');
});

Route::get('/products', [ProductController::class, 'index_client']);
Route::get('/products/{product}', [ProductController::class, 'show_client']);
Route::resource('/categories', CategoryController::class)->only('index', 'show');

Route::middleware('auth')->group(function () {
    // Logout
    Route::get('/logout', [AuthController::class, 'logout_form'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'profile_update'])->name('profile');

    // Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::post('/cart', [CartController::class, 'bulkupdate']);
    Route::post('/cart/remove', [CartController::class, 'remove']);
    Route::get('/cart/checkout', [CartController::class, 'checkout']);

    // Orders
    Route::get('/orders', [OrderController::class, 'index_client']);

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
        // Public Routes
        Route::get('/', function () {
            return view('admin.dashboard');
        });
        Route::resource('/users', UserController::class);
        Route::resource('/products', ProductController::class);
        Route::resource('/orders', OrderController::class);
    });
});

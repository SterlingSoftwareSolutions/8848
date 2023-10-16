<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyListController;
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
Route::get('/categories', [CategoryController::class, 'index_client']);
Route::get('/categories/{category}', [CategoryController::class, 'show_client']);

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
    Route::get('/cart/remove/{variant}', [CartController::class, 'remove']);

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'checkout_form']);
    Route::post('/checkout', [CheckoutController::class, 'checkout']);
    Route::get('/place-order', [CheckoutController::class, 'checkout_wholesale']);

    // My List
    Route::get('/my-list', [MyListController::class, 'index']);
    Route::post('/my-list/{product}/add', [MyListController::class, 'add']);
    Route::delete('/my-list/{product}/remove', [MyListController::class, 'remove'])->name('removeMyList');

    // Orders
    Route::get('/orders', [OrderController::class, 'index_client']);
    Route::get('/orders/{order}', [OrderController::class, 'show_client']);
    Route::get('/orders/{order}/reorder', [CheckoutController::class, 'reorder']);

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {

        // Dashboard
        Route::get('/', [HomeController::class, 'admin_dashboard']);

        // CRUD
        Route::resource('/users', UserController::class)->except(['show']);
        Route::resource('/products', ProductController::class)->except(['show']);
        Route::resource('/orders', OrderController::class)->except(['show']);
        Route::resource('/categories', CategoryController::class);

        // Order review
        Route::get('/orders/{order}/reject', [OrderController::class, 'reject']);
        Route::get('/orders/{order}/approve', [OrderController::class, 'approve']);
    });
});

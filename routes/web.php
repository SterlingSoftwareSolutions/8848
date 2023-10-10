<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('app.home');
});

Route::get('/login', [AuthController::class, 'login_form'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register_form'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('app.home');
    });

    Route::get('/logout', [AuthController::class, 'logout_form'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // User CRUD
    Route::resource('/admin/user', UserController::class);

});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MembershipController;


// ================== AUTH ==================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::prefix('products')->name('products.')->group(function () {

    Route::get('/women', function () {return view('products.women');})->name('women');

    Route::get('/men', function () {return view('products.men'); })->name('men');

    Route::get('/sale', function () {return view('products.sale');})->name('sale');

});
Route::get('/search', function () {return view('features.search');})->name('search');
Route::get('/wishlist', function () {return view('features.wishlist');})->name('wishlist');
Route::get('/profile', function () {return view('features.profile');})->name('profile');
Route::get('/cart', function () {return view('features.cart');})->name('cart');

// ================== DASHBOARD ROUTES ==================
Route::middleware(['auth'])->group(function () {

    // Dashboard user biasa
    Route::get('/user/dashboard', [DashboardController::class, 'user'])
        ->name('user.dashboard');

    // Dashboard admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
            ->name('admin.dashboard');
    });

      // Halaman daftar membership
    Route::get('/membership', [MembershipController::class, 'index'])
        ->name('membership.index');

    // Proses aktivasi (setelah pembayaran)
    Route::post('/membership/activate', [MembershipController::class, 'activate'])
        ->name('membership.activate');
});


// ================== DEFAULT ROUTE ==================
Route::get('/', function () {
    return redirect()->route('login');
});

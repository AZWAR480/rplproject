<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

// Route untuk halaman login
Route::get('/', [LoginController::class, 'login'])->name('login');

// Route untuk memproses login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk menampilkan formulir reset password
Route::get('/password/update', function () {
    return view('password.update');
})->name('password.update.form');

// Route untuk memproses reset password
Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');

// Route untuk registrasi
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk about
Route::get('/about', [DashboardController::class, 'about'])->name('about');

// Route untuk contact
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');

// Route untuk mencari barang
Route::get('/search', [DashboardController::class, 'search'])->name('search');

// Route yang membutuhkan autentikasi
Route::middleware(['web', 'auth'])->group(function () {
    // Route untuk profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Route untuk checkout
    Route::get('/checkout', [CheckoutController::class, 'showForm'])->name('checkout.showForm');
    Route::post('/checkout/add-to-cart', [CheckoutController::class, 'addToCart'])->name('checkout.addToCart');
    Route::post('/checkout/submit', [CheckoutController::class, 'submitForm'])->name('checkout.submitForm');
    Route::get('/checkout/success/{id_checkout}', [CheckoutController::class, 'success'])->name('checkout.success');

    // Route untuk cart
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    // Route untuk invoice
    Route::get('/invoice/download/{id_checkout}', [CheckoutController::class, 'downloadInvoice'])->name('invoice.download');
    Route::get('/invoice/show/{id}', [CheckoutController::class, 'showInvoice'])->name('invoice.show');
});

// Route admin tanpa middleware
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'admin'])->name('admin.dashboard');
    Route::get('customers', [AdminController::class, 'customers'])->name('admin.customers');
    Route::post('customers/store', [AdminController::class, 'store'])->name('admin.customers.store');
    Route::get('customers/{id}/edit', [AdminController::class, 'edit'])->name('admin.customers.edit');
    Route::put('customers/{id}', [AdminController::class, 'update'])->name('admin.customers.update');
    Route::delete('customers/{id}', [AdminController::class, 'destroy'])->name('admin.customers.destroy');
    Route::get('products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('products/store', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('products/{id}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');
    Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('orders/{id}', [AdminController::class, 'showOrder'])->name('admin.orders.show');
    Route::delete('orders/{id}', [AdminController::class, 'destroyOrder'])->name('admin.orders.destroy');
});


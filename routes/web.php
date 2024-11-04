<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;

// Đường dẫn đăng nhập và đăng ký
Auth::routes();
// Đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Đăng ký
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Quên mật khẩu
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Đặt lại mật khẩu
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Các route liên quan đến thông tin người dùng
Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
});


Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('/home', [PagesController::class, 'index'])->name('pages.index');
Route::get('/products', [PagesController::class, 'products'])->name('pages.products');
Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
Route::get('/contact', [PagesController::class, 'contact'])->name('pages.contact');



Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/quantity', [CartController::class, 'getCartQuantity']);
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/update/{productId}', [CartController::class, 'updateQuantity']);

Route::get('/product/{id}', [ProductController::class, 'getProductDetails'])->name('product.details');

Route::get('/products/categories/{category_id}', [ProductController::class, 'ProductWithCategory'])->name('product.productWithCategory');




<?php

use App\Http\Controllers\UI\Auth\ForgotPasswordController;
use App\Http\Controllers\UI\Auth\LoginController;
use App\Http\Controllers\UI\Auth\RegisterController;
use App\Http\Controllers\UI\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UI\PagesController;
use App\Http\Controllers\UI\ContactController;
use App\Http\Controllers\UI\CartController;
use App\Http\Controllers\UI\ProductController;
use App\Http\Controllers\UI\UserController;
use App\Http\Controllers\UI\OrderController;


use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\Auth\RegisterAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\Auth\UpdateAdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\InterfaceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\TestMiddleware;


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
    Route::post('/user/profile/{id}', [UserController::class, 'update'])->name('user.updateProfile');
});

// Route cho hiển thị các menu
Route::get('/home', [PagesController::class, 'index'])->name('pages.index');
Route::get('/products', [PagesController::class, 'products'])->name('pages.products');
Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
Route::get('/contact', [PagesController::class, 'contact'])->name('pages.contact');

//Route cho liên hệ
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Route cho giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/quantity', [CartController::class, 'getCartQuantity']);
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/update/{productId}', [CartController::class, 'updateQuantity']);

// Route cho đặt hàng
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/order/success/{orderId}', [OrderController::class, 'viewOrder'])->name('order.success');
Route::get('/orders/history', [OrderController::class, 'orderHistory'])->name('orders.history');

Route::get('/product/{id}', [ProductController::class, 'getProductDetails'])->name('product.details');
Route::get('/products/categories/{category_id}', [ProductController::class, 'ProductWithCategory'])->name('product.productWithCategory');


// QUẢN TRỊ VIÊN




Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginAdminController::class, 'login']);


    Route::middleware(AdminMiddleware::class)->group(function () { // Sử dụng middleware
        Route::get('/', [AdminPagesController::class, 'index'])->name('admin.index');
        Route::post('/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');
        Route::get('/register', [RegisterAdminController::class, 'showRegistrationForm'])->name('admin.register');
        Route::post('/register', [RegisterAdminController::class, 'register']);

        // Product
        Route::get('/listProduct', [AdminPagesController::class, 'listProduct'])->name('admin.listProduct');
        Route::get('/addProduct', [AdminPagesController::class, 'addProduct'])->name('admin.addProduct');

        // Brand
        Route::get('/listBrand', [AdminPagesController::class, 'listBrand'])->name('admin.listBrand');
        Route::get('/addBrand', [AdminPagesController::class, 'addBrand'])->name('admin.addBrand');

        // account
        Route::get('/listAdmin', [AdminPagesController::class, 'listAdmin'])->name('admin.listAdmin');
        // Route::get('/addAdmin', [AdminPagesController::class, 'addAdmin'])->name('admin.addAdmin');
        Route::get('/listUser', [AdminPagesController::class, 'listUser'])->name('admin.listUser');

        // interface
        Route::get('/updateInterface', [AdminPagesController::class, 'updateInterface'])->name('admin.updateInterface');
        Route::post('/updateInterface/logo', [InterfaceController::class, 'updateLogo'])->name('update.logo');
        Route::post('/updateInterface/footer', [InterfaceController::class, 'updateFooter'])->name('update.footer');
        Route::post('/updateInterface/slides', [InterfaceController::class, 'updateSlides'])->name('update.slides');
        Route::post('/updateInterface/header', [InterfaceController::class, 'updateHeader'])->name('update.header');

        //brand
        Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
        Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::delete('/brand/{id}', [BrandController::class, 'delete'])->name('brand.delete');

        //product
        Route::post('/products/create', [ProductsController::class, 'create'])->name('products.create');
        Route::delete('/products/{id}', [ProductsController::class, 'delete'])->name('products.delete');
        Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');

        //admin
        Route::get('/account/listAdmin', [AdminController::class, 'index'])->name('accountAdmin.index');
        // Route::post('/account/addAdmin', [AdminController::class, 'create'])->name('accountAdmin.create');
        Route::get('/admin/update/{id}', [UpdateAdminController::class, 'showUpdateForm'])->name('admin.update.form');
        Route::post('/admin/update/{id}', [UpdateAdminController::class, 'update'])->name('admin.update');
        Route::delete('/account/delete/{id}', [AdminController::class, 'delete'])->name('accountAdmin.delete');

        //user
        Route::get('/account/listUser', [UsersController::class, 'index'])->name('accountUser.index');
        Route::delete('/account/{id}', [UsersController::class, 'delete'])->name('accountUser.delete');

        //order
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
        Route::post('/orders/{id}/update-status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
        Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
    });
});

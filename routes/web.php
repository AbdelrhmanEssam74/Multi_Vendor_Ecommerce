<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::middleware(['auth', 'verified', 'roleManager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            Route::get('/settings', 'settings')->name('admin.settings');
            Route::prefix('manage')->group(function () {
                Route::get('/user', 'manage_user')->name('admin.manage.user');
                Route::get('/store', 'manage_store')->name('admin.manage.store');
            });
            Route::get('/order/history', 'order_history')->name('admin.order.history');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
        });
        // Category Routes
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/create', 'create')->name('admin.category.create');
            Route::get('/category/manage', 'manage')->name('admin.category.manage');
        });
        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/subcategory/create', 'create')->name('admin.subcategory.create');
            Route::get('/subcategory/manage', 'manage')->name('admin.subcategory.manage');
        });
        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/manage', 'manage')->name('admin.product.manage');
            Route::get('/product/product_review', 'review')->name('admin.product.review');
        });
        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/productAttribute/create', 'create')->name('admin.productAttribute.create');
            Route::get('/productAttribute/manage', 'manage')->name('admin.productAttribute.manage');
        });
        Route::controller(DiscountController::class)->group(function () {
            Route::get('/discount/create', 'create')->name('admin.discount.create');
            Route::get('/discount/manage', 'manage')->name('admin.discount.manage');
        });
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'roleManager:customer'])->name('dashboard');

// seller dashboard
Route::get('/seller/dashboard', function () {
    return view('seller');
})->middleware(['auth', 'verified', 'roleManager:seller'])->name('seller.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

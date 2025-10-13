<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerMainController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerStoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::middleware(['auth', 'verified', 'roleManager:admin'])->group(function () {
    Route::prefix('admin')->group(callback: function () {
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
        Route::controller(MasterCategoryController::class)->group(function(){
            Route::post('category/store', 'store')->name('admin.category.store');
            Route::get('category/{slug}', 'edit')->name('admin.category.edit');
            Route::put('category/update/{category_id}', 'update')->name('admin.category.update');
            Route::delete('category/delete/{category_id}', 'destroy')->name('admin.category.delete');
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
            Route::post('/productAttribute/store', 'store')->name('admin.productAttribute.store');
            Route::get('/productAttribute/edit/{att_id}', 'edit')->name('admin.productAttribute.edit');
            Route::put('/productAttribute/update/{att_id}', 'update')->name('admin.productAttribute.update');
            Route::delete('/productAttribute/delete/{att_id}', 'destroy')->name('admin.productAttribute.delete');
        });
        Route::controller(DiscountController::class)->group(function () {
            Route::get('/discount/create', 'create')->name('admin.discount.create');
            Route::get('/discount/manage', 'manage')->name('admin.discount.manage');
        });
    });
});


// Seller Routes
Route::middleware(['auth', 'verified', 'roleManager:seller'])->group(function () {
    Route::prefix('seller')->group(function () {
        Route::controller(SellerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('seller.dashboard');
            Route::get('/settings', 'settings')->name('seller.settings');
            Route::get('/order/history', 'order_history')->name('seller.order.history');

        });
        Route::controller(SellerProductController::class)->group(function () {
            Route::get('/product/create', 'create')->name('seller.product.create');
            Route::get('/product/manage', 'manage')->name('seller.product.manage');
        });
        Route::controller(SellerStoreController::class)->group(function () {
            Route::get('/store/create', 'create')->name('seller.store.create');
            Route::get('/store/manage', 'manage')->name('seller.store.manage');
        });
    });
});

//Customer Routes
Route::middleware(['auth', 'verified', 'roleManager:customer'])->group(function () {
    Route::prefix('customer')->group(function () {
        Route::controller(CustomerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('customer.dashboard');
            Route::get('/order/history', 'order_history')->name('customer.order.history');
            Route::get('/payment/settings', 'payment')->name('customer.payment.settings');
            Route::get('/affiliate', 'affiliate')->name('customer.affiliate');
        });
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

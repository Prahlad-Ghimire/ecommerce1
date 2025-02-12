<?php

use App\Http\Controllers\admin\adminmaincontroller;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\admin\productattributecontroller;
use App\Http\Controllers\admin\productcontroller;
use App\Http\Controllers\admin\productdiscountcontroller;
use App\Http\Controllers\admin\subcategorycontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\seller\sellermaincontroller;
use App\Http\Controllers\seller\sellerproductcontroller;
use App\Http\Controllers\seller\sellerstorecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:customer'])->name('dashboard');

//admin routes 
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::controller(adminmaincontroller::class)->group(function(){
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('admin.settings');
            Route::get('/manage/users', 'manage_user')->name('admin.manage.user');
            Route::get('/manage/stores', 'manage_stores')->name('admin.manage.store');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
        });
        Route::controller(categorycontroller::class)->group(function(){
            Route::get('/category/create', 'index')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage');
        });
        Route::controller(subcategorycontroller::class)->group(function(){
            Route::get('/subcategory/create', 'index')->name('subcategory.create');
            Route::get('/subcategory/manage', 'manage')->name('subcategory.manage');
        });
        Route::controller(productcontroller::class)->group(function(){
            Route::get('/product/manage', 'index')->name('product.manage');
            Route::get('/product/review/manage', 'review_manage')->name('product.review.manage');
        });
        Route::controller(productattributecontroller::class)->group(function(){
            Route::get('/productattribute/create', 'index')->name('productattribute.create');
            Route::get('/productattribute/manage', 'review_manage')->name('productattribute.manage');
        });
        Route::controller(productdiscountcontroller::class)->group(function(){
            Route::get('/discount/create', 'index')->name('discount.create');
            Route::get('/discount/manage', 'review_manage')->name('discount.manage');
        });
    });
});
//seller route
Route::middleware(['auth', 'verified', 'rolemanager:seller'])->group(function () {
    Route::prefix('seller')->group(function(){
        Route::controller(sellermaincontroller::class)->group(function(){
            Route::get('/dashboard', 'index')->name('seller');
            Route::get('/order/history', 'orderhistory')->name('seller.orderhistory');
        });

        Route::controller(sellerproductcontroller::class)->group(function(){
            Route::get('/product/create', 'index')->name('seller.product.create');
            Route::get('/product/manage', 'manage')->name('seller.product.manage');
        });

        Route::controller(sellerstorecontroller::class)->group(function(){
            Route::get('/store/create', 'index')->name('seller.store.create');
            Route::get('/store/manage', 'manage')->name('seller.store.manage');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

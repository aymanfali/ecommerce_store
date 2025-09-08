<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('/shop', [ShopController::class, 'index'])->name('index');

Route::get('/products', [StoreController::class, 'index']);
Route::get('/product-details', [StoreController::class, 'productDetails']);
Route::get('/about', [StoreController::class, 'about']);
Route::get('/cart', [StoreController::class, 'cart']);
Route::get('/contact', [StoreController::class, 'contact'])->name('contact-form');


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/products', function () {
        return view('admin.products');
    })->name('admin.products');

    Route::get('/categories', function () {
        return view('admin.categories');
    })->name('admin.categories');
});

Route::get('/dashboard/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/dashboard/products/{id}', [ProductController::class, 'show']);
Route::get('/dashboard/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/dashboard/products', [ProductController::class, 'store'])->name('product.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/dashboard/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::post('/contact', [ContactController::class, 'send']);

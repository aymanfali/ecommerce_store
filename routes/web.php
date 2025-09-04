<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('/shop', [ShopController::class,'index'])->name('index');

Route::get('/products', [StoreController::class,'index']);
Route::get('/product-details', [StoreController::class, 'productDetails']);
Route::get('/about', [StoreController::class, 'about']);
Route::get('/cart', [StoreController::class, 'cart']);
Route::get('/contact', [StoreController::class, 'contact']);


Route::get('/dashboard/products', [ProductController::class,'index'])->name('products.index');
// Route::get('/dashboard/products/{id}', [ProductController::class, 'show']);
Route::get('/dashboard/products/create', [ProductController::class,'create']);
Route::post('/dashboard/products', [ProductController::class,'store'])->name('product.store');

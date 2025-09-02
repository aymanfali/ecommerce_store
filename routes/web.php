<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('/shop', [ShopController::class,'index'])->name('index');

Route::get('/products', [StoreController::class,'index']);
Route::get('/product-details', [StoreController::class, 'productDetails']);
Route::get('/about', [StoreController::class, 'about']);

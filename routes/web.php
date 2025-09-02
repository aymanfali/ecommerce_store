<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('/shop', [ShopController::class,'index'])->name('index');

<?php

use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Mail\WelcomeEmail;
use App\Notifications\NewOrderNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('throttle:api')->prefix('v1')->group(function () {
    Route::apiResource('products', ProductController::class)->except(['edit', 'destroy']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
    Route::apiResource('categories', CategoryController::class)->except(['edit', 'destroy']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
});

Route::post('/test-notification', function (Request $request) {
    $user = User::first(); 
    Mail::to($user->email)->send(new WelcomeEmail());
    $user->notify(new NewOrderNotification());
    return response()->json(['message' => 'Test email and notification sent to ' . $user->email]);
});

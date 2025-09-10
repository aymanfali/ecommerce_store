<?php

use App\Http\Controllers\ProfileController;
use App\Mail\WelcomeEmail;
use App\Notifications\NewOrderNotification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'can:access-admin-panel'])->prefix('admin')->group(function () {
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

Route::get('/test-notification', function () {
    $user = User::first(); 
    Mail::to($user->email)->send(new WelcomeEmail());
    $user->notify(new NewOrderNotification());
    return 'Test email and notification sent to ' . $user->email;
});

require __DIR__.'/auth.php';

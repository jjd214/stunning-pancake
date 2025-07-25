<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('category', CategoryController::class);  
    Route::resource('product', ProductController::class);

    Route::post('create-payment', [\App\Http\Controllers\PaypalController::class, 'createPayment'])->name('paypal.create');

    Route::get('success', [\App\Http\Controllers\PaypalController::class, 'success'])->name('paypal.success');
    Route::get('error', [\App\Http\Controllers\PaypalController::class, 'error'])->name('paypal.error');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

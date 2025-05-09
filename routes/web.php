<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\User\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');

Route::controller(\App\Http\Controllers\User\LoginController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginStore')->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});


Route::get('/payment/success', [\App\Http\Controllers\User\PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::post('payment/notify/{key}', [PaymentController::class, 'notify'])->name('payment.notify');

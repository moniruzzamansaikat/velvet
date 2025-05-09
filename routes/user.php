<?php

use App\Helpers\RoutesHelper;

RoutesHelper::registerUserRoutes(function () {
    Route::controller('UserController')->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller('PaymentController')->prefix('payment')->name('payment.')->group(function () {
        Route::get('/history', 'paymentHistory')->name('history');
        Route::get('/new', 'newPayment')->name('new');
        Route::post('/', 'paymentInsert')->name('insert');
    });

});
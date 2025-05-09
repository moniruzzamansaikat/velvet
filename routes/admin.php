<?php

use App\Helpers\RoutesHelper;

Route::middleware(['admin.guest'])->group(function () {
    Route::view('/login', 'admin.auth.login')->name('login');
});

Route::controller('Auth\LoginController')->group(function () {
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
});

RoutesHelper::registerAdminRoutes(function () {
    Route::view('', 'admin.layouts.app');

    Route::controller('AdminController')->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/get-charge', 'getCharge')->name('charge.get');
        Route::get('/charge', 'charge')->name('charge');
        Route::get('/setting/profile', 'profile')->name('setting.profile');
        Route::post('/setting/profile', 'updateProfile')->name('setting.profile.update');
    });

    Route::controller('UserController')->group(function () {
        Route::get('/users', 'list')->name('user.list');
        Route::get('/users/new', 'new')->name('user.new');
        Route::get('/users/edit/{id}', 'edit')->name('user.edit');
        Route::post('/users/edit/{id?}', 'save')->name('user.save');
    });

    Route::controller('PaymentGatewayController')->group(function () {
        Route::get('/payment-gateways', 'list')->name('payment_gateway.list');
        Route::get('/payment-gateways/new', 'new')->name('payment_gateway.new');
        Route::get('/payment-gateways/edit/{key}', 'edit')->name('payment_gateway.edit');
        Route::post('/payment-gateways/{key?}', 'save')->name('payment_gateway.save');
    });

    Route::controller('PaymentController')->group(function () {
        Route::get('/payments', 'list')->name('payment.list');
    });
});
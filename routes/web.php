<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function () {
    Route::view('/admin', 'admin.layouts.app');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::view('/admin/users', 'admin.users.list')->name('admin.user.list');
    Route::view('/admin/setting/profile', 'admin.setting.profile')->name('admin.setting.profile');
    Route::post('/admin/setting/profile', [AdminController::class, 'updateProfile'])->name('admin.setting.profile.update');
});

Route::middleware(['admin.guest'])->group(function () {
    Route::view('/admin/login', 'admin.auth.login')->name('admin.login');
});

Route::post('/admin/login', [LoginController::class, 'login']);
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('/', function () {
    return view('welcome');
});

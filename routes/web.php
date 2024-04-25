<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', [AuthController::class, 'logout']);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticated']);
});

Route::prefix('dashboard')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('overview', [DashboardController::class, 'index'])->name('dashboard');
        Route::prefix('master')->group(function () {
            Route::resource('category', CategoryController::class);
            Route::resource('faq', FaqController::class);
        });
        Route::prefix('inform')->group(function () {
            Route::resource('brand', BrandController::class);
            Route::resource('profile', ProfileController::class);
        });
        Route::get('settings', [SettingsController::class, 'index']);
        Route::post('settings', [SettingsController::class, 'store']);
    });
});

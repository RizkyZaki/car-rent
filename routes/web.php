<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('dashboard')->group(function () {
    Route::get('overview', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('master')->group(function () {
        Route::resource('category', CategoryController::class);
        Route::resource('faq', FaqController::class);
    });
});

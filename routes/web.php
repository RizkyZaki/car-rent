<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OverrageController;
use App\Http\Controllers\PostCarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\SettingsController;
use App\Models\PostCar;
use Illuminate\Support\Facades\Route;


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
            Route::resource('overrage', OverrageController::class);
            Route::resource('brand', BrandController::class);
            Route::resource('media', MediaController::class);
            Route::resource('profile', ProfileController::class);
            Route::resource('blog', BlogController::class);
            Route::resource('post-car', PostCarController::class);
            Route::resource('rent', RentController::class);
        });
        Route::get('settings', [SettingsController::class, 'index']);
        Route::post('settings', [SettingsController::class, 'store']);
    });
});


Route::controller(ClientController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/search', 'search')->name('search');
    Route::get('/post', 'post')->name('post');
    Route::get('/post/{slug}', 'postDetail')->name('postDetail');
    Route::get('/blog/{slug}', 'blogDetail')->name('blogDetail');
    Route::get('/category/{slug}', 'categoryDetail')->name('categoryDetail');
    Route::get('/{slug}', 'profileDetail')->name('profileDetail');
});

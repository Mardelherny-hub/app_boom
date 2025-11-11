<?php

use Illuminate\Support\Facades\Route;
use Spatie\ResponseCache\Middlewares\CacheResponse;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ContactController;


// =============================================================================
// FRONTEND PUBLIC ROUTES
// =============================================================================

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Blog
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/category/{category:slug}', [BlogController::class, 'category'])->name('category');
    Route::get('/{post:slug}', [BlogController::class, 'show'])->name('show');
});

// Portfolio
Route::prefix('portfolio')->name('portfolio.')->group(function () {
    Route::get('/', [PortfolioController::class, 'index'])->name('index');
    Route::get('/category/{category:slug}', [PortfolioController::class, 'category'])->name('category');
    Route::get('/{project:slug}', [PortfolioController::class, 'show'])->name('show');
});

// Services
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/{service:slug}', [ServiceController::class, 'show'])->name('show');
});

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Dynamic Pages (debe ir al final para no interferir con otras rutas)
Route::get('/{page:slug}', [PageController::class, 'show'])->name('page.show');
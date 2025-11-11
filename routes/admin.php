<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Services
    Route::resource('services', ServiceController::class);
    
    // Portfolio
    Route::resource('projects', ProjectController::class);
    Route::delete('projects/{project}/media/{media}', [ProjectController::class, 'deleteMedia'])->name('projects.media.delete');
    Route::resource('project-categories', ProjectCategoryController::class);
    
    // Blog
    Route::resource('posts', PostController::class);
    Route::post('posts/upload-image', [PostController::class, 'uploadContentImage'])->name('posts.upload-image');
    Route::resource('post-categories', PostCategoryController::class);
    
    // Pages
    Route::resource('pages', PageController::class);
    
    // Contact Messages
    Route::resource('messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
    
    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::middleware('auth', 'is_admin')->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('/admin')->group(function() {
        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
        Route::delete('/category-destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    Route::prefix('/admin')->group(function() {
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.delete');
    });
});

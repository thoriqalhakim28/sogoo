<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function() {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile-password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/profile-delete', [ProfileController::class, 'delete'])->name('profile.delete');
    Route::get('/profile-item', [ProfileController::class, 'allItem'])->name('profile.item');
    Route::get('/profile-job', [ProfileController::class, 'allJob'])->name('profile.job');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/dashboard')->group(function() {
        Route::get('/add-item', [ItemController::class, 'create'])->name('item.create');
        Route::post('/store-item', [ItemController::class, 'store'])->name('item.store');
        Route::get('/view-item/{item}', [ItemController::class, 'show'])->name('item.view');
        Route::put('/update-item/{item}', [ItemController::class, 'update'])->name('item.update');
        Route::get('/edit-item/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');
        Route::delete('/hapus-item/{item}', [ItemController::class, 'destroy'])->name('item.destroy');
    });
    Route::prefix('/dashboard')->group(function() {
        Route::get('/add-job', [JobController::class, 'create'])->name('job.create');
        Route::post('/store-job', [JobController::class, 'store'])->name('job.store');
        Route::get('/view-job/{job}', [JobController::class, 'show'])->name('job.view');
        Route::put('/update-job/{job}', [JobController::class, 'update'])->name('job.update');
        Route::get('/edit-job/{job}/edit', [JobController::class, 'edit'])->name('job.edit');
        Route::delete('/hapus-job/{job}', [JobController::class, 'destroy'])->name('job.destroy');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

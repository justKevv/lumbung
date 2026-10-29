<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KopdesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('can:manage-admin')->group(function() {
        Route::get('/transaction', function () {
            return view('transaction');
        })->name('transaction');   
    });

    Route::middleware('can:manage-super-admin')->group(function () {
        Route::resource('user', UserController::class)->only(['index', 'store', 'edit', 'update', 'destroy'])->names('user');
        Route::resource('admin', AdminController::class)->only(['store', 'edit', 'update', 'destroy'])->names('admin');
        Route::resource('product', ProductController::class)->only(['index', 'store', 'edit', 'update', 'destroy'])->names('product');
        Route::resource('kopdes', KopdesController::class)->only(['index', 'store', 'edit', 'update', 'destroy'])->names('kopdes')->parameters(['kopdes' => 'kopdes']);
        Route::get('/kopdes/provinces/{province}/regencies', [KopdesController::class, 'regencies'])
            ->name('kopdes.regencies');
            Route::get('/kopdes/regencies/{regency}/districts', [KopdesController::class, 'districts'])
                ->name('kopdes.districts');
            Route::get('/kopdes/districts/{district}/villages', [KopdesController::class, 'villages'])
                ->name('kopdes.villages');
    });
});

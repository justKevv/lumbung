<?php

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
        Route::get('/kopdes', function () {
            return view('kopdes');
        })->name('kopdes');
    });
});

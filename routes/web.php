<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/transaction', function () {
        return view('transaction');
    })->name('transaction');
});

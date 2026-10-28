<?php

use App\Http\Controllers\KopdesController;
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
        Route::get('/kopdes', [KopdesController::class, 'index'])->name('kopdes');
        Route::get('/kopdes/provinces/{province}/regencies', [KopdesController::class, 'regencies'])
            ->name('kopdes.regencies');
            Route::get('/kopdes/regencies/{regency}/districts', [KopdesController::class, 'districts'])
                ->name('kopdes.districts');
            Route::get('/kopdes/districts/{district}/villages', [KopdesController::class, 'villages'])
                ->name('kopdes.villages');


        Route::resource('kopdes', KopdesController::class)->only(['store', 'edit', 'update', 'destroy'])->names('kopdes')->parameters(['kopdes' => 'kopdes']);;
    });
});

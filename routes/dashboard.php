<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BraceletsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SetsController;
use App\Http\Controllers\NecklacesController;
use App\Http\Controllers\EarringsController;
use App\Http\Controllers\RingsController;
use Illuminate\Support\Facades\Route;

Route::prefix()->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'check', 'verified']);
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::resource('sets', SetsController::class);
        Route::resource('rings', RingsController::class);
        Route::resource('necklaces', NecklacesController::class);
        Route::resource('bracelets', BraceletsController::class);
        Route::resource('earrings', EarringsController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('admins', AdminController::class);
        Route::post('admins/make-admin/{id}', [AdminController::class, 'makeAdmin'])->name('admins.makeAdmin');


        Route::get('settings', [DashboardController::class, 'settings'])->name('settings');
        Route::put('settings', [DashboardController::class, 'settings_update']);
        Route::get('payments', [DashboardController::class, 'payments'])->name('payments');
        Route::get('payments/{id}', [DashboardController::class, 'payments_details'])->name('payments_details');
    });
});

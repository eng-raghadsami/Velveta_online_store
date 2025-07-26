<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::prefix('/')->name('front.')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/about', [FrontController::class, 'about'])->name('about');
    Route::get('/sets', [FrontController::class, 'sets'])->name('sets');
    Route::get('/rings', [FrontController::class, 'rings'])->name('rings');
    Route::get('/earrings', [FrontController::class, 'earrings'])->name('earrings');
    Route::get('/bracelets', [FrontController::class, 'bracelets'])->name('bracelets');
    Route::get('/necklaces', [FrontController::class, 'necklaces'])->name('necklaces');
    Route::get('/details/{id}', [FrontController::class, 'details'])->name('details');
    Route::match(['get', 'post'], '/contact', [FrontController::class, 'contact'])->name('contact');

    Route::get('/search', [FrontController::class, 'search'])->name('search');
    Route::resource('cart', CartController::class)->only(['index', 'store', 'update', 'destroy']);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::prefix()->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
require __DIR__ . '/auth.php';

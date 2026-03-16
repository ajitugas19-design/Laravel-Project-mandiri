<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;

// Public routes
Route::get('/', [AuthController::class, 'showAuth'])->name('login.get');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/daftar', [AuthController::class, 'daftar'])->name('daftar.post');
Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('forgot.get');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.post');

// Auth protected routes
Route::middleware('auth')->group(function () {
    Route::get('/tampilan-awal', [AuthController::class, 'tampilanAwal'])->name('tampilan-awal');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Buku routes
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
});


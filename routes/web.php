<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', [AuthController::class, 'showAuth'])->name('login.get');
Route::get('/', [AuthController::class, 'showAuth'])->name('login.get');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/daftar', [AuthController::class, 'daftar'])->name('daftar.post');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('forgot.get');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

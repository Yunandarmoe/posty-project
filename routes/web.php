<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register-store', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/image', [ImageUploadController::class, 'index'])->name('image');
Route::post('/image', [ImageUploadController::class, 'store'])->name('image.store');




 



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/{id}/delete', [RegisterController::class, 'destroy'])->name('register.destroy');
Route::get('/{id}/download', [RegisterController::class, 'download'])->name('register.download');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::post('/home', [HomeController::class, 'store'])->name('home.store');

//Auth::routes();
 



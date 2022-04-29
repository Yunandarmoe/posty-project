<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register-store', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::group(['prefix' => 'users'], function() {
  Route::get('/', [UserController::class, 'index'])->name('users.index');
  Route::get('/create', [UserController::class, 'create'])->name('users.create');
  Route::post('/', [UserController::class, 'store'])->name('users.store');
  Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
  Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
  Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
  Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});





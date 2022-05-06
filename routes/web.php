<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register-store', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home.index');

Route::group(['prefix' => 'users'], function () {
  Route::get('/', [UserController::class, 'index'])->name('users.index');
  Route::get('/create', [UserController::class, 'create'])->name('users.create');
  Route::post('/', [UserController::class, 'store'])->name('users.store');
  Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
  Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
  Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
  Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::get('/import', [UserController::class, 'importview'])->name('users.import');
Route::post('/import', [UserController::class, 'import'])->name('users.import');
Route::get('/export',[UserController::class,'export'])->name('users.export');

Route::group(['middleware' => ['auth']], function () {
  Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
  Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
  Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::get('/chart', [ChartController::class, 'index'])->name('chart.index');



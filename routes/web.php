<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
Route::get('login', [loginController::class, 'index'])->name('login');
Route::post('login', [loginController::class, 'proses'])->name('login.proses');
Route::get('login/keluar', [loginController::class, 'keluar'])->name('login.keluar');

Route::get('users', function () {
  return view('users.index');
})->name('users')->middleware('auth');

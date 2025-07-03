<?php

use App\Http\Controllers\HoroscopeController;
use App\Http\Controllers\RizzCounterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/index', [IndexController::class, 'index']);
Route::get('/horoscope',[HoroscopeController::class, 'horoscope']);
Route::get('/rizz_counter_graph', [RizzCounterController::class, 'rizzCounter']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);



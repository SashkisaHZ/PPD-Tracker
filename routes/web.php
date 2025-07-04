<?php

use App\Http\Controllers\HoroscopeController;
use App\Http\Controllers\RizzCounterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Public routes
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/index', [IndexController::class, 'index']);
    Route::get('/horoscope', [HoroscopeController::class, 'horoscope']);
    Route::get('/rizz_counter_graph', [RizzCounterController::class, 'rizzCounter']);
    Route::get('/year1', function () {
        return view('main.year1');
    });
    Route::get('/year2', function () {
        return view('main.year2');
    });
    Route::get('/year3', function () {
        return view('main.year3');
    });
    Route::get('/year4', function () {
        return view('main.year4');
    });
});

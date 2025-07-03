<?php

use App\Http\Controllers\HoroscopeController;
use App\Http\Controllers\RizzCounterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [IndexController::class, 'index']);
Route::get('/horoscope',[HoroscopeController::class, 'horoscope']);
Route::get('/rizz_counter_graph', [RizzCounterController::class, 'rizzCounter']);

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
Route::view('/year1', 'year1');
Route::view('/year2', 'year2');
Route::view('/year3', 'year3');
Route::view('/year4', 'year4');

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

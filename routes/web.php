<?php

use App\Http\Controllers\HoroscopeController;
use App\Http\Controllers\InteractPurposefullyController;
use App\Http\Controllers\RizzCounterController;
use App\Http\Controllers\Year2Controller;
use App\Http\Controllers\Year3Controller;
use App\Http\Controllers\Year4Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TaskProgressController;

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
    Route::get('/year1', [InteractPurposefullyController::class, 'index']);
    Route::get('/year2', [Year2Controller::class, 'index']);
    Route::get('/year3', [Year3Controller::class, 'index']);
    Route::get('/year4', [Year4Controller::class, 'index']);

    // Route for progress for teachers
    Route::put('/tasks/{year}/{index}', [TaskProgressController::class, 'update'])->name('tasks.update');
    // Feedback route for teachers
    Route::post('/feedback/{year}/{index}', [TaskProgressController::class, 'feedback'])->name('tasks.feedback');

    Route::post('/notifications/dismiss/{index}', function ($index) {
        $notifications = session('notifications', []);
        if (isset($notifications[$index])) {
            unset($notifications[$index]);
            session(['notifications' => array_values($notifications)]);
        }
        return back();
    })->name('notifications.dismiss')->middleware('auth');
});

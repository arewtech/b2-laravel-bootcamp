<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard');
Route::resource('/tasks', TaskController::class);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

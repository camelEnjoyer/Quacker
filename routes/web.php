<?php

use App\Http\Controllers\QuackController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::resource('users', UserController::class);
Route::resource('quacks', QuackController::class);


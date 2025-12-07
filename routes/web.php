<?php

<<<<<<< HEAD
use App\Http\Controllers\QuackController;
=======
use App\Http\Controllers\QuashtagController;
>>>>>>> josh-branch
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::resource('users', UserController::class);
<<<<<<< HEAD
Route::resource('quacks', QuackController::class);

=======
Route::resource('quashtags', QuashtagController::class);
>>>>>>> josh-branch

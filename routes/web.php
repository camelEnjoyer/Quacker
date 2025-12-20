<?php
use App\Http\Controllers\QuackController;
use App\Http\Controllers\QuashtagController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::resource('users', UserController::class);
Route::resource('quacks', QuackController::class);
Route::resource('quashtags', QuashtagController::class);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::get('/home', function () {
    return view('home');
})->middleware('auth');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');
?>
<?php

use App\Http\Controllers\feedController;
use App\Http\Controllers\QuackController;
use App\Http\Controllers\QuashtagController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserQuacksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

// Página de inicio
Route::get('/', function () {
    return view('inicio');
});

// Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

// Rutas de usuarios públicas
Route::get('/users/{user}/quacks', [UserQuacksController::class, 'index'])->name('users.quacks');

// Recursos públicos (quacks y quashtags)
Route::resource('quacks', QuackController::class)->only(['index', 'show']);
Route::resource('quashtags', QuashtagController::class)->only(['index', 'show']);


/*
|--------------------------------------------------------------------------
| Rutas protegidas por autenticación
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Feed principal
    Route::get('/feed', [feedController::class, 'index'])->name('feed');

    // Logout
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

    // Perfil del usuario
    Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/edit', [UserController::class, 'update'])->name('users.update');

    // CRUD completo de usuarios (opcional, si admin puede gestionar usuarios)
    Route::resource('users', UserController::class)->except(['show']);
});

<?php

use App\Http\Controllers\feedController;
use App\Http\Controllers\FollowController;
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

// LOGIN
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

// REGISTER
Route::get('/register', [UserController::class, 'create'])->name('users.create');
Route::post('/register', [UserController::class, 'store'])->name('users.store');

// Perfil de usuario público
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/quacks', [UserQuacksController::class, 'index'])->name('users.quacks');

// Recursos públicos: Quacks y Quashtags
Route::resource('quacks', QuackController::class)->only(['index', 'show']);
Route::resource('quashtags', QuashtagController::class)->only(['index', 'show']);
Route::delete('/quacks/{quack}', [QuackController::class, 'destroy'])
    ->name('quacks.destroy')
    ->middleware('auth');

// QUAVEAR Y UNQUAVEAR?¿ HAHAH
Route::post('/quacks/{quack}/quav', [QuackController::class, 'quav'])
    ->name('quacks.quav')
    ->middleware('auth');

Route::post('/quacks/{quack}/unquav', [QuackController::class, 'unquav'])
    ->name('quacks.unquav')
    ->middleware('auth');
// REQUACKS
Route::post('/quacks/{quack}/requack', [QuackController::class, 'requack'])
    ->name('quacks.requack')
    ->middleware('auth');

Route::post('/quacks/{quack}/unrequack', [QuackController::class, 'unrequack'])
    ->name('quacks.unrequack')
    ->middleware('auth');
// QUASHTAGS
Route::resource('quashtags', QuashtagController::class);
Route::get('/quashtags/{quashtag}/quacks', [QuashtagController::class, 'quacks'])->name('quashtags.quacks');

/*
|--------------------------------------------------------------------------
| Rutas protegidas por autenticación
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Feed principal
    Route::get('/feed', [feedController::class, 'index'])->name('feed');
    Route::post('/feed', [QuackController::class, 'store']);

    // Logout
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

    // Perfil: Editar / Update
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    // Búsqueda de usuarios
    Route::get('/search-users', [UserController::class, 'search'])->name('users.search');

    // CRUD completo de usuarios excepto crear y registrar
    Route::resource('users', UserController::class)->except(['create', 'store', 'show']);

    // Seguimiento
    Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
});

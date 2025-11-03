<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\DispositivoRedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran todas las rutas web de la aplicación.
| Estas rutas son cargadas por RouteServiceProvider dentro del grupo "web".
|
*/

// 🔓 RUTAS PÚBLICAS (sin autenticación)
Route::get('/', function () {
    return view('welcome'); // Página de bienvenida sin menú
});

// 🔒 RUTAS AUTENTICADAS
Route::middleware(['auth'])->group(function () {

    // Dashboard y Home
    Route::view('/dashboard', 'dashboard')->middleware('verified')->name('dashboard');
    Route::view('/home', 'home')->name('home'); // Página con menú principal

    /*
    |--------------------------------------------------------------------------
    | PERFIL DE USUARIO
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | USUARIOS
    |--------------------------------------------------------------------------
    | Todos los usuarios autenticados pueden listar usuarios.
    | Solo los administradores pueden editarlos o eliminarlos.
    */
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::middleware('role:admin')->group(function () {
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | RECURSOS PRINCIPALES
    |--------------------------------------------------------------------------
    | CRUD completo para empleados, equipos, impresoras y dispositivos de red.
    | Si más adelante quieres limitar acciones por rol, se puede separar en grupos.
    */
    Route::resources([
        'empleados' => EmpleadoController::class,
        'equipos' => EquipoController::class,
        'impresoras' => ImpresoraController::class,
        'dispositivos_red' => DispositivoRedController::class,
    ]);
	Route::get('/exportar-inventario', [ExportController::class, 'export'])->name('exportar.inventario');

});

// Rutas de autenticación generadas por Breeze / Jetstream / Fortify
require __DIR__.'/auth.php';

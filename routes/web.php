<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegistroUsuariofController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ConsultasController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/consultas-libretillas', [ConsultasController::class, 'index'])->name('consultas.index');
Route::post('/consultas-libretillas', [ConsultasController::class, 'buscar'])->name('consultas.buscar');


Route::middleware(['auth'])->group(function () {

    
    

    Route::get('/profesor/panel', [ProfesorController::class, 'index'])->name('profesor.panel');
    Route::post('/profesor/subir', [ProfesorController::class, 'subirLibreta'])->name('profesor.subir');

    Route::middleware([\App\Http\Middleware\InicioDirector::class])->group(function () {
        Route::get('/director/asignaciones', [AsignacionController::class, 'index'])->name('director.asignaciones.index');
        Route::post('/director/asignaciones', [AsignacionController::class, 'guardar'])->name('director.asignaciones.guardar');

        Route::get('/regusuarios', [RegistroUsuariofController::class, 'mostrarPanel'])->name('profesores.vista');
        Route::post('/regusuarios/guardar', [RegistroUsuariofController::class, 'guardarProfesor'])->name('profesores.guardar');
        Route::put('/regusuarios/actualizar/{id}', [RegistroUsuariofController::class, 'actualizarProfesor'])->name('profesores.actualizar');
        Route::delete('/regusuarios/eliminar/{id}', [RegistroUsuariofController::class, 'eliminarProfesor'])->name('profesores.eliminar');



    });
    

});



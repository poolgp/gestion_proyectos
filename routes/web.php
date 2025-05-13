<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectoController;


Route::get('/', function () {
    return view('index');
});

Route::get('/login', [UsuarioController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/logout', [UsuarioController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        $user = Auth::user();
        return view('home', compact('user'));
    });
});

Route::resource('proyecto', ProyectoController::class);
Route::resource('tarea', TareaController::class);
Route::get('proyecto/{proyecto}/tareas', [TareaController::class, 'index'])->name('proyecto.tareas.index');
//Route::get('/tarea/create', [TareaController::class, 'create'])->name('tarea.create');
Route::post('/tarea', [TareaController::class, 'store'])->name('tarea.store');

Route::get('/tareas/{id_proyecto}', [TareaController::class, 'index'])->name('tarea.index');
Route::post('/tareas', [TareaController::class, 'store'])->name('tarea.store');
//Route::get('/tareas/create', [TareaController::class, 'create'])->name('tarea.create');



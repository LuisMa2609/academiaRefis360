<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\GuiasController;

Route::middleware(['auth', 'verified'])->group(function(){

Route::get('/', function () {
            return view('guias/index');
        });

//Route::get('/index', function () { return view('guias/index'); })->name('index');

Route::get('/index', [GuiasController::class, 'index'])->name('index');

Route::get('/usuarios/registrar', [UserController::class, 'register'])->name('users.register');

Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');

Route::get('/usuarios/{user}/', [UserController::class, 'detallesDeUsuario'])->name('users.detallesdeusuario');

Route::patch('/usuarios/{user}/', [UserController::class, 'asignarPerfiles'])->name('users.asignarPerfiles');

Route::patch('/usuarios/deshabilitar/{user}', [UserController::class, 'deshabilitarusuario'])->name('users.deshabilitarusuario');

Route::patch('/usuarios/habilitar/{user}', [UserController::class, 'habilitarusuario'])->name('users.habilitarusuario');

Route::get('/perfiles', [PerfilController::class, 'index'])->name('permisos');

Route::patch('/perfiles/seccion-asignada', [PerfilController::class, 'asignarSeccion'])->name('asignarSeccion');

});

Auth::routes();
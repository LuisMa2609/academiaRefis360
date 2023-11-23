<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\GuiasController;

Route::middleware(['auth', 'verified'])->group(function(){

Route::get('/', [GuiasController::class, 'index'])->name('index');

Route::get('/index', [GuiasController::class, 'index'])->name('index');

Route::get('/guías/listado', [GuiasController::class, 'crud'])->name('guias.crud');

Route::get('/guías/listado/editar/{guia}', [GuiasController::class, 'editGuia'])->name('guias.edit');

Route::patch('/guías/listado/{guia}/update', [GuiasController::class, 'updateGuia'])->name('guias.update');

Route::get('/guías/crear', [GuiasController::class, 'createGuia'])->name('guias.create');

Route::post('/guías/crear/store', [GuiasController::class, 'store'])->name('guias.store');

Route::post('/guías/actualizar-estado', [GuiasController::class, 'updateStatus'])->name('guias.updatestatus');

Route::get('/usuarios/registrar', [UserController::class, 'register'])->name('users.register');

Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');

Route::post('/usuarios/actualizar-estado', [UserController::class, 'updateStatus'])->name('users.updatestatus');

Route::patch('/usuarios/update/{user}/', [UserController::class, 'updateUsuario'])->name('users.updateusuarios');

Route::get('/usuario/{user}/', [UserController::class, 'configurarUsuario'])->name('users.configurarusuario');

Route::get('/usuarios/{user}/', [UserController::class, 'detallesDeUsuario'])->name('users.detallesdeusuario');

Route::patch('/usuarios/{user}/', [UserController::class, 'asignarPerfiles'])->name('users.asignarPerfiles');

Route::get('/perfiles', [PerfilController::class, 'index'])->name('permisos');

Route::patch('/perfiles/seccion-asignada', [PerfilController::class, 'asignarSeccion'])->name('asignarSeccion');

Route::post('/perfiles/actualizar-estado', [PerfilController::class, 'updateStatus'])->name('perfiles.updatestatus');

Route::patch('/perfiles/perfil-actualizado', [PerfilController::class, 'updateperfil'])->name('perfiles.updateperfil');

Route::get('/perfiles/perfil/store', [PerfilController::class, 'storeperfil'])->name('perfiles.storeperfil');
});

Auth::routes();
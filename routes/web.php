<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'verified'])->group(function(){

Route::get('/', function () {
            return view('guias/index');
        });

Route::get('/index', function () { return view('guias/index'); })->name('index');

Route::get('/usuarios/registrar', [UserController::class, 'register'])->name('users.register');

Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');

Route::get('/usuarios/{user}', [UserController::class, 'detallesDeUsuario'])->name('users.detallesdeusuario');


});

Auth::routes();
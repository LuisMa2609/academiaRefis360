<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function index(){
        $this->authorize('admin');
        $user = User::find(1);
        return view('users.index', [
            'users' => User :: first()->paginate(10)
        ]);
    }

    public function register(){
        $this->authorize('admin');
        return view('auth.register');
    }

    public function detallesDeUsuario(User $user){
        return view('users.detallesusuario', [
            'user' => $user
        ]);
    }

//    public function destroy(User $project){
//        $project->delete();
//
//        return redirect()->route('projects.index',$project)->with('status', 'Proyecto eliminado correctamente');
//    }

}

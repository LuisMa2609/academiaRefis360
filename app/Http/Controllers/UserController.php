<?php

namespace App\Http\Controllers;
use App\Models\UsuarioPerfil;
use App\Models\User;
use App\Models\Perfiles;
//use DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function index(){
        $this->authorize('admin');
        $user = User::find(1);
        return view('users.index', [
            'users' => User :: latest()->paginate(5)
        ]);
    }

    public function register(){
        $this->authorize('admin');
        return view('auth.register');
    }

    public function detallesDeUsuario(User $user){
        $this->authorize('admin');
        //$perfiles = DB::table('perfiles')->get();
        $perfiles = Perfiles::all();
        $usuarioperfils = $user->perfiles->pluck('id')->toArray();

        return view('users.detallesusuario', [
            'user' => $user,
            'perfiles' => $perfiles,
            'usuarioperfils' => $usuarioperfils
        ]);
    }

    public function actualizarUsuariosPerfil(Request $request, User $user){
        $perfiles = $request->input('perfiles', []);
        $user -> perfiles()->sync($perfiles);
        return redirect()->route('users.detallesdeusuario', $user);
    }

//    public function destroy(User $project){
//        $project->delete();
//
//        return redirect()->route('projects.index',$project)->with('status', 'Proyecto eliminado correctamente');
//    }

}

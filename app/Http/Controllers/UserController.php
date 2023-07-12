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
            'users' => User::where('status', '1')->latest()->paginate(30),
            'usersoff' => User::where('status', '0')->latest()->paginate(30)
        ]);
    }

    public function register(){
        $this->authorize('admin');
        return view('auth.register');
    }

    public function detallesDeUsuario(User $user){
        $this->authorize('admin');
        //$perfiles = DB::table('perfiles')->get();
        $perfiles = Perfiles::with('secciones')->get();
        $usuarioperfils = $user->perfiles->pluck('id')->toArray();
        return view('users.detallesusuario', [
            'user' => $user,
            'perfiles' => $perfiles,
            'usuarioperfils' => $usuarioperfils
        ]);
    }

    public function asignarPerfiles(Request $request, User $user){
        $perfiles = $request->input('perfiles', []);
        $user -> perfiles()->sync($perfiles);
        //dd($perfiles);
        return redirect()->route('users.detallesdeusuario', $user);
    }
    
    public function habilitarusuario($id){
        $user = User::findOrFail($id);
        $user -> update (['status' => !$user->status]);
        return back();
    }

    public function deshabilitarusuario($id){
        $useroff = User::findOrFail($id);
        $useroff -> update (['status' => !$useroff->status]);
        return back();
    }


//    public function destroy(User $project){
//        $project->delete();
//
//        return redirect()->route('projects.index',$project)->with('status', 'Proyecto eliminado correctamente');
//    }

}

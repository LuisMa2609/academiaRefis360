<?php

namespace App\Http\Controllers;
use App\Models\UsuarioPerfil;
use App\Models\User;
use App\Models\Perfiles;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $this->authorize('admin');
        $user = User::find(1);
        return view('users.index', [
            'users' => User:: paginate(10),
            //'users' => User::where('status', '1')->latest()->paginate(5),
            //'usersoff' => User::where('status', '0')->latest()->paginate(5)
        ]);
    }

    public function register(){
        $this->authorize('admin');
        return view('auth.register');
    }

    public function updateUsuario(User $user, Request $request){
        $this->authorize('admin');
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email'=> $request->email,
            'celular' => $request->cellphone,
            'puesto' => $request->puesto,
            'updated_at' => now()
        ]);

        return redirect()->route('users.detallesdeusuario', $user)->with('status', 'Usuario actualizado correctamente');
    }

    public function detallesDeUsuario(User $user){
        $this->authorize('admin');
        //$perfiles = DB::table('perfiles')->get();
        $perfiles = Perfiles::with('secciones')->get();
        $perfiles_users = $user->perfiles->pluck('id')->toArray();
        $opciones = ['Practicante', 'Empleado', 'Jefe de área', 'Supervisor', 'Gerente', 'Director'];
        return view('users.detallesusuario', [
            'user' => $user,
            'perfiles' => $perfiles,
            'perfiles_users' => $perfiles_users,
            'opciones' => $opciones
        ]);
    }

    public function asignarPerfiles(Request $request, User $user){
        $perfiles = $request->input('perfiles', []);
        $user -> perfiles()->sync($perfiles);
        //dd($perfiles);
        //return redirect()->route('users.detallesdeusuario', $user);
        return back()->with('status', 'Perfil/es asignado/s correctamente');
    }
    
    public function habilitarusuario($id){
        $user = User::findOrFail($id);
        //$user -> update (['status' => !$user->status]);
        $user->status=1;
        $user->save();
        //dd($user->status, $id);
        return back();
    }

    public function deshabilitarusuario($id){
        $useroff = User::findOrFail($id);
        //$useroff -> update (['status' => !$useroff->status]);
        $useroff->status=0;
        $useroff->save();
        //dd($useroff->status, $id);
        return back();
    }


//    public function destroy(User $project){
//        $project->delete();
//
//        return redirect()->route('projects.index',$project)->with('status', 'Proyecto eliminado correctamente');
//    }

}

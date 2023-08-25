<?php

namespace App\Http\Controllers;
use App\Models\UsuarioPerfil;
use App\Models\User;
use App\Models\Perfiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $this->authorize('admin');
        $user = User::find(1);
        return view('users.index', [
            'users' => User::latest()-> paginate(20),
            //'users' => User::where('status', '1')->latest()->paginate(5),
            //'usersoff' => User::where('status', '0')->latest()->paginate(5)
        ]);
    }

    public function register(){
        $this->authorize('admin');
        return view('auth.register');
    }

    public function updateUsuario(User $user, Request $request){
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email'=> $request->email,
            'celular' => $request->cellphone,
            'puesto' => $request->puesto,
            'updated_at' => now()
        ]);

        // return redirect()->route('users.detallesdeusuario', $user)->with('status', 'Usuario actualizado correctamente');

        if (Gate::allows('admin')) {
            return redirect()->route('users.detallesdeusuario', $user)->with('status', 'Usuario actualizado correctamente');
        } else {
            return redirect()->route('users.configurarusuario', $user)->with('status', 'Su usuario ha sido actualizado correctamente');
        }
    }

    //public function updateUsuario(User $user, Request $request){
    //    $user->update([
    //        'name' => $request->name,
    //        'surname' => $request->surname,
    //        'email'=> $request->email,
    //        'celular' => $request->cellphone,
    //        'puesto' => $request->puesto,
    //        'updated_at' => now()
    //    ]);
//
    //    return redirect()->route('users.detallesdeusuario', $user)->with('status', 'Usuario actualizado correctamente');
    //}


    public function detallesDeUsuario(User $user){
        $this->authorize('admin');
        //$perfiles = DB::table('perfiles')->get();
        $perfiles = Perfiles::with('secciones')->get();
        $perfiles_users = $user->perfiles->pluck('id')->toArray();
        return view('users.detallesusuario', [
            'user' => $user,
            'perfiles' => $perfiles,
            'perfiles_users' => $perfiles_users,
        ]);
    }

    public function configurarUsuario(User $user){
        $user = Auth::user();
        $perfiles = Perfiles::with('secciones')->get();
        $perfiles_users = $user->perfiles->pluck('id')->toArray();
        
        return view('users.detallesusuario', [
            'user' => $user,
            'perfiles' => $perfiles,
            'perfiles_users' => $perfiles_users,
        ]);
    }

    public function asignarPerfiles(Request $request, User $user){
        if (!$request->has('perfiles')) {
            return back()->with('status', 'Porfavor selecciona al menos 1 perfil');
        }
        $this->validate($request, [
            'perfiles' => 'required|array|min:1',
            'perfiles.*' => 'exists:perfiles,id'
        ]);
        $perfiles = $request->input('perfiles', []);
        $user -> perfiles()->sync($perfiles);
        //dd($perfiles);
        return back()->with('status', 'Perfil/es asignado/s correctamente');
    }
    
    public function updateStatus(Request $request)
    {
        $userId = $request->input('user_id');
        $newStatus = $request->input('new_status');
    
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        $user->status = $newStatus;
        $user->save();
    

    }
}
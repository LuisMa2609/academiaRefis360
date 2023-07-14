<?php

namespace App\Http\Controllers;
use App\Models\Perfiles;
use App\Models\Secciones;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index(Perfiles $perfil){
        $this->authorize('admin');
        $perfiles  = Perfiles::with('secciones')->get();
        $secciones = Secciones::all();
        $perfilsecciones = $perfil->secciones->pluck('id')->toArray();
        return view('permisos',[
            'perfiles' => $perfiles,
            'secciones'=> $secciones,
            'perfilsecciones' => $perfilsecciones
        ]);
    }

   public function asignarSeccion(Request $request){
        $perfil_id = $request->input('perfil_id');
        $secciones = $request->input('secciones');
        
        $perfilesarray = array($perfil_id);

        $perfiles = Perfiles::find($perfil_id);
        $perfiles->secciones()->sync($secciones);
        
        dd($secciones, $perfilesarray, $perfiles->secciones);
        return redirect()->route('permisos');
    }
}
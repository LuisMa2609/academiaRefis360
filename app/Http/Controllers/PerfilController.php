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
       $perfilesID = $request->input('perfilesID');
       $secciones = $request->input('secciones');
       
       $perfiles = Perfiles::find($perfilesID);
       $perfiles->secciones()->sync($secciones);
       
       //dd($perfiles->secciones);
        return redirect()->route('permisos');
    }
}

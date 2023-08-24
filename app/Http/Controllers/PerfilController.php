<?php

namespace App\Http\Controllers;
use App\Models\Perfiles;
use App\Models\Secciones;
use App\Models\Permisos;

use Illuminate\Http\Request;

class PerfilController extends Controller{

    public function index(Perfiles $perfil){
        $this->authorize('admin');
        $perfiles = Perfiles::with('secciones', 'permisos')->get();
        $secciones = Secciones::with('permisos')->get();
        $permisos = Permisos::all();
        
        $perfilesArray = [];
        foreach ($perfiles as $perfil) {
            $perfilArray = [
                'id' => $perfil->id,
                'nombreperfil' => $perfil->nombreperfil,
                'secciones' => [],
            ];
        
            foreach ($secciones as $seccion) {
                $pivotData = $perfil->secciones->where('id', $seccion->id)->pluck('pivot');
        
                $seccionArray = [
                    'id' => $seccion->id,
                    'nombreseccion' => $seccion->nombreseccion,
                    'checked' => $pivotData->pluck('status')->contains(1),
                    'permisos' => [],
                ];
        
                foreach ($permisos as $permiso) {
                    $pivotDatos = $perfil->permisos->where('id', $permiso->id)->pluck('pivot');
        
                    $seccionArray['permisos'][] = [
                        'id' => $permiso->id,
                        'permiso' => $permiso->permiso,
                        'statuspermiso' => $pivotDatos->pluck('status'), 
                    ];
                }
        
                $perfilArray['secciones'][] = $seccionArray;
            }
        
            $perfilesArray[] = $perfilArray;
        }
        
        // dd($perfilArray);
        // dd($perfilesArray);
        // dd($pivotDatos);
        return view('permisos', compact('perfilesArray'));    
    
    }
    
    
    public function asignarSeccion(Request $request){
        $this->authorize('admin');
        
        foreach ($request->input('perfil_id') as $key => $value) {
            $perfil = Perfiles::find($value);
            if ($perfil) {
                $perfil->secciones()->sync($request->input('secciones.' . $key, []));
            }
        }
    
        return redirect()->route('permisos');
    }
}
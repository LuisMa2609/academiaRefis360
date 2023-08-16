<?php

namespace App\Http\Controllers;
use App\Models\Perfiles;
use App\Models\Secciones;
use App\Models\Permisos;

use Illuminate\Http\Request;

class PerfilController extends Controller{
    public function index(Perfiles $perfil){
        $this->authorize('admin');
        $perfiles = Perfiles::with('secciones')->get();
        $secciones = Secciones::with('permisos')->get();
        $permisos = Permisos::all();
        //$perfil_secciones_permisos = $perfil->secciones->pluck('id')->toArray();
        $perfilesArray = [];
        foreach ($perfiles as $perfil) {
            $perfilArray = [
                'id' => $perfil->id,
                'nombreperfil' => $perfil->nombreperfil,
                'secciones' => [],
            ];
            
            foreach ($secciones as $seccion) {
                $seccionArray = [
                    'id' => $seccion->id,
                    'nombreseccion' => $seccion->nombreseccion,
                    'checked' => $perfil->secciones->contains($seccion),
                    'permisos' => [],
                ];
                
                foreach ($permisos as $permiso) {
                    $seccionArray['permisos'][] = [
                        'id' => $permiso->id,
                        'permiso' => $permiso->permiso,
                        'checked' => $perfil->permisos->contains($permiso) && $seccion->permisos->contains($permiso),
                    ];
                }
                
                $perfilArray['secciones'][] = $seccionArray;
            }
            
            $perfilesArray[] = $perfilArray;
        }
        // dd($perfilArray);
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
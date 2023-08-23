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
                $pivotData = $perfil->secciones->firstWhere('id', $seccion->id)->pivot;
                // $pivotData = $perfil->secciones->where('id', $seccion->id)->where('pivot.status', 1)->first()->pivot;

                $seccionArray = [
                    'id' => $seccion->id,
                    'nombreseccion' => $seccion->nombreseccion,
                    'status' => $pivotData->status,
                    'checked' => $pivotData->status == 1, // Estado de la relación perfil-sección en la tabla pivote
                    'permisos' => [],
                ];
                
                foreach ($permisos as $permiso) {
                    $pivotDatos = $perfil->permisos->firstWhere('id', $permiso->id)->pivot;
                
                    $seccionArray['permisos'][] = [
                        'id' => $permiso->id,
                        'permiso' => $permiso->permiso,
                        'statuspermiso' => $pivotDatos->status,
                        'checked' => $pivotDatos->status == 1, // Estado del permiso en la relación perfil-sección-permiso
                    ];
                }
                
                $perfilArray['secciones'][] = $seccionArray;
            }
            
            $perfilesArray[] = $perfilArray;
        }
        // dd($perfilArray);
        dd($perfilesArray);
        // return view('permisos', compact('perfilesArray'));
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
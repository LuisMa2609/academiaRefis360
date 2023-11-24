<?php

namespace App\Http\Controllers;
use App\Models\Perfil;
use App\Models\Seccion;
use App\Models\Permiso;
use DB;

use Illuminate\Http\Request;

class PerfilController extends Controller{

    public function index(Perfil $perfil){
        $this->authorize('admin');
        $perfiles = Perfil::with('secciones', 'permisos')->where('status', 1)->get();
        $perfilesAll = Perfil::all();
        $secciones = Seccion::with('permisos')->get();
        $permisos = Permiso::all();
        

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
        
        
        // dd($secciones);
        // dd($perfilesArray);
        // dd($pivotDatos);
        return view('permisos', compact('perfilesArray', 'perfiles', 'perfilesAll'));    
    
    }
    
    
    public function asignarSeccion(Request $request){
        $this->authorize('admin');
        $perfilSeccionPermisoStatusArray = $request->input('perfil_seccion_permiso_status');
    
        foreach ($perfilSeccionPermisoStatusArray as $perfilId => $secciones) {
            foreach ($secciones as $seccionId => $permisos) {
                foreach ($permisos as $permisoId => $status) {
                    DB::table('perfil_secciones_permisos')
                        ->where([
                            'perfil_id' => $perfilId,
                            'seccion_id' => $seccionId,
                            'permiso_id' => $permisoId,
                        ])
                        ->update(['status' => $status]);
                }
            }
        }
    
        return redirect()->route('permisos')->with('succes', "secciones y permisos actualizados");
    }

    public function storeperfil(Request $request){
        $this->authorize('admin');

        $request->validate([
            'nombreperfil' => 'required|string|max:255',
        ]);

        $nombreperfil = $request->input('nombreperfil');

        $perfil = new Perfil();
        $perfil-> nombreperfil = $nombreperfil;
        $perfil->save();

        $permisos = [1, 2, 3];
        $secciones = [1, 2, 3];
    
        foreach ($permisos as $permiso_id) {
            foreach ($secciones as $seccion_id) {

            $perfil->permisos()->attach($permiso_id, ['seccion_id' => $seccion_id, 'status' => 0]);
            }
        }
    
        return back()->with('succes', 'Perfil creado con exito');
    }

    public function updateperfil(Request $request, Perfil $perfil){
        $this->authorize('admin');

        $this->validate($request, [
            'nombreperfil' => 'required|string|max:255,'.$perfil->id
        ]);

        $perfil->update([
            'nombreperfil' => $request->nombreperfil
        ]);

        return back()->with('succes', 'Perfil editado con exito');
    }

    public function updateStatus(Request $request){
        $this->authorize('admin');
        $perfilId = $request->input('perfil_id');
        $newStatus = $request->input('new_status');

    
        $perfil = Perfil::find($perfilId);
        if (!$perfil) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        $perfil->status = $newStatus;
        $perfil->save();

        return json_decode(true);

    }
}
// dd($permisoStatus);
// dd($permisoId);
<?php

namespace App\Http\Controllers;
use App\Models\Perfiles;
use App\Models\Secciones;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index(Perfiles $perfil)
    {
        $this->authorize('admin');
        $perfiles = Perfiles::with('secciones')->get();
        $secciones = Secciones::all();
        //$perfilsecciones = $perfil->secciones->pluck('id')->toArray();
        $perfilesArray = [];
        foreach ($perfiles as $perfil) {
            $perfilArray = [
                'id' => $perfil->id,
                'nombreperfil' => $perfil->nombreperfil,
                'secciones' => [],
            ];
            foreach ($secciones as $seccion) {
                $perfilArray['secciones'][] = [
                    'id' => $seccion->id,
                    'nombreseccion' => $seccion->nombreseccion,
                    'checked' => $perfil->secciones->contains($seccion),
                ];
            }
            $perfilesArray[] = $perfilArray;
        }
        return view('permisos', compact('perfilesArray'));
    }
    
    public function asignarSeccion(Request $request)
    {
        $this->authorize('admin');
        
        // Save the sections for each profile
        foreach ($request->input('perfil_id') as $key => $value) {
            $perfil = Perfiles::find($value);
            if ($perfil) {
                $perfil->secciones()->sync($request->input('secciones.' . $key, []));
            }
        }
    
        return redirect()->route('permisos');
    }}
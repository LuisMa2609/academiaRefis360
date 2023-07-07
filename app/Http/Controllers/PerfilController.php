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
        return view('permisos',[
            'perfiles' => $perfiles,
            'secciones'=> $secciones
        ]);
    }
    
   //public function agignarSeccion(Request $request, Perfiles $perfiles){
   //    $secciones = $request->input('secciones', []);
   //    $perfiles -> secciones()->sync($secciones);
   //    return redirect()->route('permisos', $perfil);
   //}

   public function asignarSeccion(Request $request, int $perfilId)
   {
       $perfil = Perfiles::find($perfilId);
       if ($perfil) {
           $secciones = $request->input('secciones', []);
           $perfil->secciones()->sync($secciones);
       }
       return redirect()->route('permisos');
   }    
   //public function agignarSeccion(Request $request, Perfiles $perfiles){
   // $secciones = $request->input('secciones', []);
   // dd($secciones); // Imprime el valor del array $secciones
   // $perfiles -> secciones()->sync($secciones);
   // return redirect()->route('permisos', $perfil);
   // }
}

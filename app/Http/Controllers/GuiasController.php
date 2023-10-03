<?php

namespace App\Http\Controllers;
use App\Models\Guia;
use App\Models\Perfil;
use App\Models\Seccion;
use App\Models\User;
use App\Models\Permiso;
use App\Models\RelacionGuias;
use DB;
use App\Models\PerfilSeccionPermiso;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class GuiasController extends Controller
{
    // $guias = Guias::all();
    // return view('guias.index', [
    //     'guias' =>$guias
    // ]);

    // comparacion de seccion y permisos existentes y asignados en la tabla pivote 

    public function index(){    
        $user = Auth::user();
        $perfiles = $user->perfiles->unique();
        // $secciones = $user->secciones->unique();
        // $permisos = $user->permisos->unique();
        // $guias = $user->guias->unique();
        
        // $guias = collect();
        
        // foreach($perfiles as $perfil){
        //     foreach($perfil->secciones as $seccion){
        //         foreach($seccion->permisos as $permiso){
        //             $guiasKey = "{$perfil->id}_{$seccion->id}_{$permiso->id}";
        //             $guias = $guias[$guiasKey] ?? collect();
    
        //             foreach ($permiso->guias as $guia) {
        //                 if (!$guias->contains('id', $guia->id)) {
        //                     $guias->push($guia);
        //                 }
        //             }
    
        //             $guias[$guiasKey] = $guias;
        //         }
            
        //     }
        // }
        
        return view('guias.index',[
            'perfiles' => $perfiles,
            // 'secciones' => $secciones,
            // 'permisos' => $permisos,
            // 'guias' => $guias
            // 'secciones' => $secciones
        ]);    

    }

    public function crud(){
        $this->authorize('admin');
        $guias = Guia::all();
        return view('guias.crudGuias',[
            'guias' =>$guias
        ]);
    }

    public function editguia(Guia $guia){
        $this->authorize('admin');
        $perfiles = Perfil::all();
        $secciones = Seccion::all();
        $permisos = Permiso::all();
        $guiasperfil = $guia->perfiles;
        $guiasseccion = $guia->secciones;
        $guiaspermiso = $guia->permisos;
        
        $guia->load('perfiles');
        // dd($guiasseccion);
        
        return view('guias.createGuias', [
            'guia' => $guia,
            'perfiles' => $perfiles,
            'secciones' => $secciones,
            'permisos' => $permisos,
            'guiasperfil' => $guiasperfil,
            'guiasseccion' => $guiasseccion,
            'guiaspermiso' => $guiaspermiso,
        ]);
    }

    public function updateguia(Guia $guia, Request $request){
        $this->authorize('admin');

        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'urlvideo' => 'required|string|max:255',
            'urlpdf' => 'required|string|max:255',
            
        ]);

        $guia->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'urlvideo' => $request->urlvideo,
            'urlpdf' => $request->urlpdf,
            'updated_at' => now()
        ]);

        $permiso = $request->input('permiso_id');
        $seccion = $request->input('seccion_id');
        $perfil = $request->input('perfil_id');
        
        DB::table('relacionguias')->where('guia_id', $guia->id)->update([
            'perfil_id' => $perfil,
            'permisos_id' => $permiso,
            'seccion_id' => $seccion,
        ]);

        // return redirect()->route('guias.edit', $guia)->with('status', 'Guia actualizada');

        $request->session()->flash('succes', 'Guia actualizada');
        $request->session()->flash('status_expires_at', now()->addSeconds(5)); // Mensaje desaparecerá en 5 segundos

        return redirect()->route('guias.edit', $guia);
    }

    public function createGuia(){
        $this->authorize('admin');
        $guias = Guia::all();
        $perfiles = Perfil::all();
        $secciones = Seccion::all();
        $permisos = Permiso::all();

        return view('guias.createGuias',[
            'guias' =>$guias,
            'perfiles' => $perfiles,
            'secciones' => $secciones,
            'permisos' => $permisos,
        ]);
    }

    public function store(Request $request){
        $this->authorize('admin');
        $request->validate([
            'perfil_id' => 'required|numeric',
            'seccion_id' => 'required|numeric',
            'permiso_id' => 'required|numeric', // Agrega la regla de validación
        ], [
            'perfil_id.required' => 'Por favor, selecciona un perfil.', // Mensaje de error personalizado
        ]);

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $urlvideo = $request->input('urlvideo');
        $urlpdf = $request->input('urlpdf');
        $perfil = $request->input('perfil_id');
        $seccion = $request->input('seccion_id');
        $permiso = $request->input('permiso_id');
        

        $guia = new Guia();
        $guia->nombre = $nombre;
        $guia->descripcion = $descripcion;
        $guia->urlvideo = $urlvideo;
        $guia->urlpdf = $urlpdf;
        
        // dd($nombre, $descripcion, $urlvideo, $urlpdf, $perfil, $seccion, $permiso);
        
        $guia->save();
        $guia->perfiles()->attach($perfil, ['seccion_id' => $seccion, 'permisos_id' => $permiso]);

        // return view('guias.createGuias');
        return back()->with('succes', 'Guiá creada con exito');

    }

    public function updateStatus(Request $request){
        $this->authorize('admin');
        $guiaId = $request->input('guia_id');
        $newStatus = $request->input('new_status');
    
        $guia = Guia::find($guiaId);
        if (!$guia) {
            return response()->json(['message' => 'Guia no encontrado'], 404);
        }
    
        $guia->status = $newStatus;
        $guia->save();
    }

}

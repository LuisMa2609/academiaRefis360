<?php

namespace App\Http\Controllers;
use App\Models\Guia;
use App\Models\Perfil;
use App\Models\Seccion;
use App\Models\User;
use App\Models\Permiso;
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
        $perfiles = $user->perfiles;
        $secciones = $user->secciones;
        $permisos = $user->permisos;
        
        $guias = $user->guias;
        // $guias = Guia::all();
        // dd($guias);
        
        // $guias = Guia::with('secciones')->get();

        // dd($secciones);

        
        // $secciones = [];
        // $permisos = [];
        // foreach ($perfiles as $perfil) {
        //     $secciones[] = $perfil->seccionesasignados;
        //     $permisos[] = $perfil->permisosasignados;
        // }

        // $secciones[] = $secciones;
        // $permisos[] =  $permisos;
        
        return view('guias.index',[
            'perfiles' => $perfiles,
            'secciones' => $secciones,
            'permisos' => $permisos,
            'guias' => $guias
            // 'secciones' => $secciones
        ]);    

    }


    public function crud(){
        $guias = Guia::all();
        return view('guias.crudGuias',[
            'guias' =>$guias
        ]);
    }

    public function create(){
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
        return back()->with('status', 'Guiá creada con exito');

    }

    public function updateStatus(Request $request){
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

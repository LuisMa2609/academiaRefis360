<?php

namespace App\Http\Controllers;
use App\Models\Guias;
use App\Models\Perfiles;
use App\Models\Secciones;
use App\Models\Permisos;




use Illuminate\Http\Request;

class GuiasController extends Controller
{
    public function index(){
        // $guias = Guias::all();
        // return view('guias.index', [
        //     'guias' =>$guias
        // ]);


        $guias = Guias::with(['perfiles', 'secciones', 'permisos'])->get();
        $guiasPorSeccion = $guias->groupBy(function ($guia) {
            return $guia->secciones->first()->id;
        });

        return view('guias.index', [
            'guiasPorSeccion' => $guiasPorSeccion
        ]);
    }


    public function crud(){
        $guias = Guias::all();
        return view('guias.crudGuias',[
            'guias' =>$guias
        ]);
    }

    public function create(){
        $guias = Guias::all();
        $perfiles = Perfiles::all();
        $secciones = Secciones::all();
        $permisos = Permisos::all();

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
        

        $guia = new Guias();
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
    
        $guia = Guias::find($guiaId);
        if (!$guia) {
            return response()->json(['message' => 'Guia no encontrado'], 404);
        }
    
        $guia->status = $newStatus;
        $guia->save();
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Guia;
use App\Models\Perfil;
use App\Models\Seccion;
use App\Models\User;
use App\Models\Permiso;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class GuiasController extends Controller
{
    public function index(){
        // $guias = Guias::all();
        // return view('guias.index', [
        //     'guias' =>$guias
        // ]);


        $usuarioAutenticado = Auth::user();

        // Obtener las secciones asignadas al usuario autenticado
        $seccionesDelUsuario = $usuarioAutenticado->secciones;
    
        // Inicializar un arreglo para almacenar las guías relacionadas
        $guiasRelacionadas = [];
    
        // Iterar a través de las secciones del usuario
        foreach ($seccionesDelUsuario as $seccion) {
            // Obtener las guías que compartan perfil, usuario y permiso
            $guias = Guia::whereHas('relacion', function ($query) use ($usuarioAutenticado, $seccion) {
                $query->where('perfil_id', $usuarioAutenticado->perfiles->pluck('id'))
                      ->where('seccion_id', $seccion->id)
                      ->whereIn('permisos_id', $usuarioAutenticado->perfiles->pluck('pivot.permiso_id'));
            })->get();
    
            // Agregar las guías relacionadas al arreglo
            $guiasRelacionadas[$seccion->nombreseccion] = $guias;
        }
    
        // Renderizar la vista y pasar los datos
        return view('guias.index', [
            'secciones' => $seccionesDelUsuario,
            'guiasRelacionadas' => $guiasRelacionadas,
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

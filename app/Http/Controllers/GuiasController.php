<?php

namespace App\Http\Controllers;
use App\Models\Guia;
use App\Models\Perfil;
use App\Models\Seccion;
use App\Models\User;
use App\Models\Permiso;
use App\Models\RelacionGuias;
use DB;
use Illuminate\Support\Facades\Gate;
use App\Models\PerfilSeccionPermiso;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class GuiasController extends Controller{
    public function index(){
        $user = Auth::user();
        $perfiles = $user->perfiles()->with('secciones', 'permisos')->where('status', 1)->get();
        $secciones = $user->secciones()->with('permisos')->get();
        // $permisos = $user->permisos;
        $permisos = Permiso::all();

        // dd($permisoo->toArray(), $permisos->toArray());
        // dd($perfiles->toArray());

        // $guias = Guia::with([
        //     'perfiles' => function ($query) {
        //         $query->select('perfil_id', 'nombreperfil');
        //     },
        //     'secciones' => function ($query) {
        //         $query->select('seccion_id', 'nombreseccion');
        //     }
        // ])->get(['id', 'nombre', 'descripcion']);
        

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

        // dd($perfiles->toArray(), $perfilArray);
        // dd($perfilArray);

        
        // $seccionesG = 
        // $GUIAS = Guia::with('perfiles', 'secciones')->get();
        
        // foreach($perfiles as $perfil){
        //     foreach($perfil->secciones as $seccion){
        //         foreach($seccion->guias as $guia){
        //             $todo = [$guia];

        //         }
        //     }
        // }


        
        // dd($secciones->toArray(),$permisos->toArray() );
        // $guias = Guia::with('perfiles', 'secciones')->get();
        

        $guiasIds = [];
        
        return view('guias.index',[
            'perfiles' => $perfiles,
            'guiasIds' => $guiasIds,
            'permisos' => $permisos,
            'secciones' => $secciones,
            // 'guias' => $guias,
            'perfilesArray' => $perfilesArray
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
        // $this->authorize('admin');
        Gate::authorize('admin');
        // Gate::authorize('user');
        $perfiles = Perfil::all();
        $secciones = Seccion::all();
        $permisos = Permiso::all();
        $guiasperfil = $guia->perfiles;
        $guiasseccion = $guia->secciones;
        
        $guia->load('perfiles');

        return view('guias.createGuias', [
            'guia' => $guia,
            'perfiles' => $perfiles,
            'secciones' => $secciones,
            'permisos' => $permisos,
            'guiasperfil' => $guiasperfil,
            'guiasseccion' => $guiasseccion,
        ]);
    }

    public function updateguia(Guia $guia, Request $request){
        $this->authorize('admin');

        $this->validate($request, [
            'nombre' => 'required|string|max:255|unique:guias,nombre,'.$guia->id,
            'descripcion' => 'required|string|unique:guias,descripcion,'.$guia->id,
            'urlvideo' => 'required|string|max:255|unique:guias,urlvideo,'.$guia->id,
            'urlpdf' => 'required|string|max:255|unique:guias,urlpdf,'.$guia->id,
            
            'perfiles' => 'required|array|min:1',
            'perfiles.*' => 'exists:perfiles,id',

            'seccion_id' => 'required|numeric',
            
        ]);

        $guia->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'urlvideo' => $request->urlvideo,
            'urlpdf' => $request->urlpdf,
        ]);
        $seccion = $request->input('seccion_id');
        $perfil = $request->input('perfiles');
        
        // dd($input);
        
        $guia->perfiles()->sync($perfil);
        $guia->secciones()->sync($seccion);

        // DB::table('relacionguias')->where('guia_id', $guia->id)->update([
        //     'perfil_id' => $perfil,
        //     'seccion_id' => $seccion,
        // ]);


        $request->session()->flash('succes', 'Guia actualizada');
        $request->session()->flash('status_expires_at', now()->addSeconds(5));


        return redirect()->route('guias.edit', $guia);
    }

    public function createGuia(){
        $this->authorize('admin');
        $guias = Guia::all();
        $perfiles = Perfil::all();
        $secciones = Seccion::all();

        return view('guias.createGuias',[
            'guias' =>$guias,
            'perfiles' => $perfiles,
            'secciones' => $secciones,
        ]);
    }

    public function store(Request $request){
        $this->authorize('admin');
        $request->validate(
            [
            'nombre' => 'required|string|max:255|unique:guias',
            'descripcion' => 'required|string|max:255|unique:guias',
            'urlvideo' => 'required|max:255|unique:guias',
            'urlpdf' => 'required|max:255|unique:guias',
            // url en urlvideo & urlpdf
            'perfiles' => 'required|array|min:1',
            'perfiles.*' => 'exists:perfiles,id',
            'seccion_id' => 'required|numeric',
            // 'permiso_id' => 'required|numeric',
            ]
        );

        // dd($request);


        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $urlvideo = $request->input('urlvideo');
        $urlpdf = $request->input('urlpdf');
        $perfil = $request->input('perfiles');
        $seccion = $request->input('seccion_id');
        

        $guia = new Guia();
        $guia->nombre = $nombre;
        $guia->descripcion = $descripcion;
        $guia->urlvideo = $urlvideo;
        $guia->urlpdf = $urlpdf;

        // dd($request);

        
        $guia->save();
        $guia->perfiles()->attach($perfil);
        $guia->secciones()->attach($seccion);
        // , 'permisos_id' => $permiso


        return back()->with('succes', 'Guía creada con exito');

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

        return json_encode(true);
    }

}

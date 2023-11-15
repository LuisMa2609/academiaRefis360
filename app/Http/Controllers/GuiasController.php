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

class GuiasController extends Controller{
    public function index(){    
        $user = Auth::user();
        $perfiles = $user->perfiles;
        $secciones = $user->secciones;
        $permisos = $user->permisos;
        
        $guiasIds = [];

        return view('guias.index',[
            'perfiles' => $perfiles,
            'guiasIds' => $guiasIds,
            'permisos' => $permisos
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
        // $guiaspermiso = $guia->permisos;
        
        $guia->load('perfiles');
        
        return view('guias.createGuias', [
            'guia' => $guia,
            'perfiles' => $perfiles,
            'secciones' => $secciones,
            'permisos' => $permisos,
            'guiasperfil' => $guiasperfil,
            'guiasseccion' => $guiasseccion,
            // 'guiaspermiso' => $guiaspermiso,
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

        // dd($guia, $request);

        
        $guia->perfiles()->sync($perfil, ['seccion_id' => $seccion]);


        // DB::table('relacionguias')->where('guia_id', $guia->id)->update([
        //     'perfil_id' => $perfil,
        //     // 'permisos_id' => $permiso,
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
        // $permisos = Permiso::all();

        return view('guias.createGuias',[
            'guias' =>$guias,
            'perfiles' => $perfiles,
            'secciones' => $secciones,
            // 'permisos' => $permisos,
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
        // $permiso = $request->input('permiso_id');
        

        $guia = new Guia();
        $guia->nombre = $nombre;
        $guia->descripcion = $descripcion;
        $guia->urlvideo = $urlvideo;
        $guia->urlpdf = $urlpdf;

        // dd($request);

        
        $guia->save();
        $guia->perfiles()->attach($perfil, ['seccion_id' => $seccion]);
        // , 'permisos_id' => $permiso

        // dd($guia);

        return back()->with('succes', 'Guía creada con exito');

    }

    public function updateStatus(Request $request){
        $this->authorize('admin');
        $guiaId = $request->input('guia_id');
        $newStatus = $request->input('new_status');
        $status = $request->input('status');
    
        $guia = Guia::find($guiaId);
        if (!$guia) {
            return response()->json(['message' => 'Guia no encontrado'], 404);
        }
    
        $guia->status = $newStatus;
        $guia->save();

        return json_decode(true);
    }

}

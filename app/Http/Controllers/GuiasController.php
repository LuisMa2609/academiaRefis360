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
        $perfiles = $user->perfiles()->where('status', 1)->get();
        $secciones = $user->secciones()->with('permisos')->where('status', 1)->get();
        $permisos = $user->permisos;

        $GuiasArray = [];

        foreach ($perfiles as $perfil) {
            $guiasIds[$perfil->id] = [];
            $perfilData = [
                'id' => $perfil->id,
                'PERFIL' => $perfil->nombreperfil,
                'SECCIONES' => [],
            ];
        
            foreach ($perfil->secciones as $seccion) {
                
                $seccionData = [
                    'id' => $seccion->id,
                    'seccion' => $seccion->nombreseccion,
                    'perfil_id' => $seccion->pivot->perfil_id,
                    'PERMISOS' => [],
                    'Guias' => []
                ];
        
                foreach ($seccion->permisosasignados  as $permiso) {
                    $permisoData = [
                        'id'=>$permiso->id,
                        'permiso' => $permiso->permiso,
                        'perfil_id' => $permiso->pivot->perfil_id,
                        'seccion_id' => $permiso->pivot->seccion_id,
                        'SECCION' => $seccion->nombreseccion,
                    ];

                    if($permiso->id == 3 && $permiso->pivot->perfil_id == $perfil->id) {
                        foreach ($seccion->guias as $guia) {
                            if ($guia->perfiles->contains($perfil) && $guia->secciones->contains($seccion) && !in_array($guia->id, $guiasIds[$perfil->id] ?? [])) {
                                $guiaData = [
                                'id' => $guia->id,  
                                'Guía' => $guia->nombre,
                                'descripcion'=>$guia->descripcion,
                                'video'=>$guia->urlvideo,
                                'pdf'=>$guia->urlpdf,
                                'status' => $guia->status,
                                'seccionGuia' => []
                                ];
        
                                foreach ($guia->secciones as $guiaSeccion) {
                                    $guiaseccionData=[
                                    'id'=>$guiaSeccion->id,
                                    'guiaseccion'=>$guiaSeccion->nombreseccion
                                    ];
                                    $guiaData['seccionGuia'][] = $guiaseccionData;
                                }
                                $seccionData['Guias'][]= $guiaData;
        
                                $guiasIds[$perfil->id][] = $guia->id;
                            }
                        }
                    } 
                    else {
                        foreach ($seccion->guias->where('status', 1) as $guia) {
                            if ($guia->perfiles->contains($perfil) && $guia->secciones->contains($seccion) && !in_array($guia->id, $guiasIds[$perfil->id] ?? [])) {
                                $guiaData = [
                                'id' => $guia->id,  
                                'Guía' => $guia->nombre,
                                'descripcion'=>$guia->descripcion,
                                'video'=>$guia->urlvideo,
                                'pdf'=>$guia->urlpdf,
                                'status' => $guia->status,
                                'seccionGuia' => []
                                ];
        
                                foreach ($guia->secciones as $guiaSeccion) {
                                    $guiaseccionData=[
                                    'id'=>$guiaSeccion->id,
                                    'guiaseccion'=>$guiaSeccion->nombreseccion
                                    ];
                                    $guiaData['seccionGuia'][] = $guiaseccionData;
                                }
                                $seccionData['Guias'][]= $guiaData;
        
                                $guiasIds[$perfil->id][] = $guia->id;
                            }
                        }
    
                    }
        
                    $seccionData['PERMISOS'][] = $permisoData;
                }

                
                
                $perfilData['SECCIONES'][] = $seccionData;
            }
            $GuiasArray[] = $perfilData;
        }

        $guiasIds = [];

        // dd($perfil->toArray());
        
        return view('guias.index',[
            'perfiles' => $perfiles,
            'guiasIds' => $guiasIds,
            'permisos' => $permisos,
            'secciones' => $secciones,
            'user' => $user,
            'GuiasArray' => $GuiasArray
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

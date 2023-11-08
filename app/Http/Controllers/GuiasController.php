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
<<<<<<< HEAD
    // $guias = Guias::all();
    // return view('guias.index', [
    //     'guias' =>$guias
    // ]);

    // comparacion de seccion y permisos existentes y asignados en la tabla pivote

    public function index(){
=======
    public function index(){    
>>>>>>> 908c2fec39647963eee4cca4eae4ccfdce0e6cd5
        $user = Auth::user();
        $perfiles = $user->perfiles;
        $secciones = $user->secciones;
        $permisos = $user->permisos;
<<<<<<< HEAD

        // dd($permisos);
=======
        
>>>>>>> 908c2fec39647963eee4cca4eae4ccfdce0e6cd5
        $guiasIds = [];

        return view('guias.index',[
            'perfiles' => $perfiles,
            'guiasIds' => $guiasIds,
            'permisos' => $permisos
        ]);
    }

<<<<<<< HEAD
            // $secciones = $user->secciones->unique();
        // $permisos = $user->permisos->unique();
        // $guias = $user->guias->unique();

        // $guias = collect();

        // foreach($perfiles as $perfil){
        //     foreach($perfil->secciones as $seccion){
        //         foreach($seccion->permisos as $permiso){
        //             // $guiasKey = "{$perfil->id}_{$seccion->id}_{$permiso->id}";
        //             // $guias = $guias[$guiasKey] ?? collect();
        //             foreach ($permiso->guias as $guia) {
        //                 if (!$guias->contains('id', $guia->id)) {
        //                     $guias->push($guia);
        //                 }
        //             }
        //             // $guias[$guiasKey] = $guias;
        //         }
        //     }
        // }

        // $perfilesarray=[];
        // foreach($perfiles as $perfil){
        //     $perfilarray = [
        //         'id' => $perfil->id,
        //         '--PERFIL--' => $perfil->nombreperfil,
        //         '--SECCIONES--'=>[],
        //     ];

        //     foreach($perfil->secciones as $seccion){
        //         $seccionarray = [
        //             'id' => $seccion->id,
        //             '--SECCION--' => $seccion->nombreseccion,
        //             '--PERMISOS--'=>[]
        //         ];

        //         foreach($seccion->permisos as $permiso){
        //             $seccionarray['--PERMISOS--'][] = [
        //                 'id'=>$permiso->id,
        //                 '--PERMISO--' => $permiso->permiso,
        //                 // 'guias' => []
        //             ];
        //             // foreach( $permiso->guias as $guia ){
        //             //   $seccionarray['permisos']['guias'][] = [
        //             //       'id'=>$guia->id,
        //             //       'nombre' => $guia->nombre
        //             //   ];
        //             // }
        //         }
        //         $perfilarray['--SECCIONES--'][] = $seccionarray;
        //     }
        //     $perfilesarray[] = $perfilarray;
        // }
        // dd($perfilesarray);

                    // 'secciones' => $secciones,
            // 'permisos' => $permisos,
            // 'guias' => $guias
            // 'secciones' => $secciones


=======
>>>>>>> 908c2fec39647963eee4cca4eae4ccfdce0e6cd5
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
<<<<<<< HEAD
        // dd($guiasseccion);

=======
        
>>>>>>> 908c2fec39647963eee4cca4eae4ccfdce0e6cd5
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
<<<<<<< HEAD
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'urlvideo' => 'required|string|max:255',
            'urlpdf' => 'required|string|max:255',

=======
            'nombre' => 'required|string|max:255|unique:guias,nombre,'.$guia->id,
            'descripcion' => 'required|string|unique:guias,descripcion,'.$guia->id,
            'urlvideo' => 'required|string|max:255|unique:guias,urlvideo,'.$guia->id,
            'urlpdf' => 'required|string|max:255|unique:guias,urlpdf,'.$guia->id,
            'perfil_id' => 'required|numeric',
            'seccion_id' => 'required|numeric',
            'permiso_id' => 'required|numeric',
            
>>>>>>> 908c2fec39647963eee4cca4eae4ccfdce0e6cd5
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

        // dd($permiso, $seccion, $perfil);

        $request->session()->flash('succes', 'Guia actualizada');
        $request->session()->flash('status_expires_at', now()->addSeconds(5)); 

        // dd($perfil);

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
        $request->validate(
            [
            'nombre' => 'required|string|max:255|unique:guias',
            'descripcion' => 'required|string|max:255|unique:guias',
            'urlvideo' => 'required|url|max:255|unique:guias',
            'urlpdf' => 'required|url|max:255|unique:guias',
            'perfil_id' => 'required|numeric',
            'seccion_id' => 'required|numeric',
            'permiso_id' => 'required|numeric',
            ], 
            [
            'perfil_id.required' => 'Por favor, selecciona un perfil.',
            ]
        );

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
<<<<<<< HEAD

        // dd($nombre, $descripcion, $urlvideo, $urlpdf, $perfil, $seccion, $permiso);

=======
        
>>>>>>> 908c2fec39647963eee4cca4eae4ccfdce0e6cd5
        $guia->save();
        $guia->perfiles()->attach($perfil, ['seccion_id' => $seccion, 'permisos_id' => $permiso]);

        // dd($guia);

        return back()->with('succes', 'Guiá creada con exito');

    }

    public function updateStatus(Request $request){
        $this->authorize('admin');
        $guiaId = $request->input('guia_id');
        $newStatus = $request->input('new_status');
<<<<<<< HEAD

=======
        $status = $request->input('status');
    
>>>>>>> 908c2fec39647963eee4cca4eae4ccfdce0e6cd5
        $guia = Guia::find($guiaId);
        if (!$guia) {
            return response()->json(['message' => 'Guia no encontrado'], 404);
        }

        $guia->status = $newStatus;
        $guia->save();

<<<<<<< HEAD
        return json_encode(true);
=======
        return json_decode(true);
>>>>>>> 908c2fec39647963eee4cca4eae4ccfdce0e6cd5
    }

}

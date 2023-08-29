<?php

namespace App\Http\Controllers;
use App\Models\Guias;
use App\Models\Perfiles;



use Illuminate\Http\Request;

class GuiasController extends Controller
{
    public function index(){
        $guias = Guias::all();
        return view('guias.index', [
            'guias' =>$guias
        ]);
    }


    public function crud(){
        $guias = Guias::all();
        return view('guias.crudGuias',[
            'guias' =>$guias
        ]);
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

<?php

namespace App\Http\Controllers;
use App\Models\Perfiles;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index(){
        $this->authorize('admin');
        $perfiles = Perfiles::with('secciones')->get();
        return view('permisos', [
            'perfiles' => $perfiles
        ]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Guias;


use Illuminate\Http\Request;

class GuiasController extends Controller
{
    public function index()
    {
        return view('guias.index', [
            'guias' => Guias :: latest()->paginate(5)
        ]);
    }

}

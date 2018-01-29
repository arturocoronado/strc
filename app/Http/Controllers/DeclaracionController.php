<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Laboral;

class DeclaracionController extends Controller
{
    public function index() {
        
        return view('servidor.declaracion_index');
    }
    
    public function generales() {
        $user = Usuario::find(auth()->user()->id);
        $lab = Laboral::find(session('DEC_POSITION'));
        
        return view('servidor.declaracion_generales')
                ->with('user', $user)
                ->with('laboral', $lab);

    }
}

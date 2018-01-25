<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Usuario;
use App\Laboral;

class MiCuentaController extends Controller
{
    public function index() {
        
//        dd(session('DEC_POSITION'));
        
        $laborales = Usuario::find(auth()->user()->id)->laborales;
        
        $personales = Usuario::find(auth()->user()->id);
        
        return view('servidor.micuenta_index')
                ->with('laborales', $laborales)
                ->with('personales', $personales);
        
    }
       
    
    public function change($id) {
        $position = Usuario::find(auth()->user()->id)->laborales()->where('id', $id)->get();
        
        if($position){
            session()->put('DEC_POSITION', $id);
        }else{
            abort(404);
        }
        
        sleep(1);
    }
}

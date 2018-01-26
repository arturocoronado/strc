<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Usuario;
use App\Laboral;
use App\Declaracion;
use Carbon\Carbon;

class MiCuentaController extends Controller
{
    public function index() {
        
        $laborales = Usuario::find(auth()->user()->id)->laborales()->orderBy('id', 'DESC')->get();
        
        $personales = Usuario::find(auth()->user()->id);
        
        session()->forget('DEC_POSITION');
        if(!session('DEC_POSITION')){
            session()->put('DEC_POSITION', $laborales->first()->id);
            $this->EvalDec();
        }
        
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
    
    public function password() {
        return view('servidor.password');
    }
    
    public function pwdsave(Request $r) {
        $r->validate([
            'actual'    => 'required|max:255', 
            'Password'  => 'required|max:255|confirmed'
        ]);
        
        $user = Usuario::find(auth()->user()->id);

        if($user->Password == md5($r->actual)){
            $user->Password = md5($r->Password);
            $user->save();        
        }else{
            return response()->json(['message' => 'La contraseña actual no es correcta'], 404);
        }
        
       
    }
    
     private function EvalDec(){
//         dd(session('DEC_POSITION'));
        $dec = Laboral::find(session('DEC_POSITION'))->declaraciones()->orderBy('id', 'DESC')->first();
        $carbon = Carbon::createFromDate("2018-01-01");
            dd($carbon);
        if(!$dec){
            session()->put('DEC_NEXT', 'INICIAL');
        }else{
            
        }
        dd(session('DEC_NEXT'));
    }
}

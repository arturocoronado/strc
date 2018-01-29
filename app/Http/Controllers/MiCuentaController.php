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
        
//        dd(auth()->user()->rol()->Rol);
        
        $laborales = Usuario::find(auth()->user()->id)->laborales()->orderBy('id', 'DESC')->get();
        
        $personales = Usuario::find(auth()->user()->id);
        
        
        $this->EvalDec($laborales);
        
        if(!session('DEC_POSITION')){
            session()->put('DEC_POSITION', $laborales->first()->id);
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
        
        return redirect('/micuenta');
        
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
            return response()->json(['message' => 'La contraseña actual no es correcta'], 500);
        }
        
    }
    
     private function EvalDec($laborales){
        $now = new Carbon();
        $status = array();
        
        foreach($laborales as $lab){
            $dec = $lab->declaraciones()->orderBy('id', 'DESC')->first();
            $start = new Carbon($lab->Inicio);

            if(!$dec){
                
                $status[ $lab->id ]['NEXT'] = "INICIAL " . $start->year;
                $status[ $lab->id ]['AVAILABLE'] = true;

            }elseif($dec->Tipo == "INICIAL"){

                if($start->year < $now->year){
                    $status[ $lab->id ]['NEXT'] = 'ANUAL ' . $now->year;
                    $status[ $lab->id ]['AVAILABLE'] = true;  
                }else{
                    $status[ $lab->id ]['NEXT'] = 'ANUAL ' . ($start->year+1);
                    $status[ $lab->id ]['AVAILABLE'] = false;  
                }

            }elseif($dec->Tipo == "ANUAL"){

                $last = new Carbon($dec->Fecha);
                if($last->year < $now->year){
                    $status[ $lab->id ]['NEXT'] = 'ANUAL ' . $now->year;
                    $status[ $lab->id ]['AVAILABLE'] = true;
                 }else{
                     $status[ $lab->id ]['NEXT'] = 'ANUAL ' . ($last->year+1);
                     $status[ $lab->id ]['AVAILABLE'] = false;
                 }

            }else{

                $status[ $lab->id ]['NEXT'] = "NINGUNA";
                $status[ $lab->id ]['AVAILABLE'] = false;

            }
        }
        
        session()->put('DEC_STATUS', $status);
//        dd(session('DEC_STATUS')[2]['NEXT']);
    }
}

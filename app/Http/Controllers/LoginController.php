<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Usuario;

class LoginController extends Controller
{
    //
    public function index() {
        return view('base');
    }
    
    public function enter(Request $req) {
        
        $isAdmin = substr_count($req->usuario, "@");
        
        if($isAdmin){
            $req->validate([
                'usuario'    => 'required|email', 
                'pwd'   => 'required'
             ]);
        }else{
            $req->validate([
                'usuario'    => 'required|alpha_num|size:13', 
                'pwd'   => 'required'
             ]);
        }
        
        if($isAdmin)
            $auth = Usuario::where('Correo', 'ilike', $req->usuario)->where('Password', md5($req->pwd))->first();
        else
            $auth = Usuario::where('RFC', 'ilike', $req->usuario)->where('Password', md5($req->pwd))->first();
        
//        $auth = \App\Usuario::where(function($query) use ($req){
//            $query->where('RFC', 'ilike', $req->rfc);
//            $query->orWhere('Password', $req->Password);
//        })->toSql();

        
        if($auth){
            Auth::loginUsingId($auth->id);
            if($isAdmin){
                return redirect()->intended('/');
            
            }else
                return redirect('/micuenta');
        }

        return redirect()->route('login.index')->withInput();
    }
    
    public function out(Request $r) {
        auth()->logout();
        session()->flush();
        return redirect()->route('login.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index() {
        return view('base');
    }
    
    public function enter(Request $req) {

        $req->validate([
           'rfc'    => 'required|size:13|alpha_num', 
           'pwd'   => 'required'
        ]);
        
        $auth = \App\Usuario::where('RFC', 'ilike', "$req->rfc")->where('Password', md5($req->pwd))->first();
        
//        $auth = \App\Usuario::where(function($query) use ($req){
//            $query->where('RFC', 'ilike', $req->rfc);
//            $query->orWhere('Password', $req->Password);
//        })->toSql();

        
        if($auth){
            Auth::loginUsingId($auth->id);
            
            return redirect()->intended('/');
        }

        return redirect()->route('login.index')->withInput();
    }
    
    public function out(Request $req) {
//        $req->session()->flush();
        auth()->logout();
        return redirect()->route('login.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Rol;

class UsuariosController extends Controller
{
    public function index(Request $request) {
        
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Ver", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");

        $params[] = array("Header" => "Editar", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");

        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Nombre", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ro");
        $params[] = array("Header" => "RFC", "Width" => "100", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ro");
        $params[] = array("Header" => "Correo", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Estatus", "Width" => "150", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        
//        dd($request->url());
        
        return view('usuarios.usu_index')
                ->with('params', $params);
                
    }
    
    public function data(Request $req) {
        $users = Usuario::all();
        
        $content=  "<?xml version='1.0' encoding='UTF-8'?>\n";
        $content.=  "<rows pos='0'>";
        
        
        foreach($users as $i => $u){
            $content.= "<row id = '$u->id'>";
            $content.= "<cell>" . ($i+1) . "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-search-plus' onclick='View(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-pencil' onclick='Edit(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-trash-o' onclick='Delete(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Nombre)."</cell>";
            $content.= "<cell>" .htmlspecialchars($u->RFC)."</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Correo)."</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Estatus)."</cell>";
            $content.= "</row>";
        }
            
        $content.=  "</rows>";
        return response($content)->header('Content-Type', 'text/xml');
    }
    
    public function form(Request $req, $user = null) {
        if($user){
            $user = Usuario::find($user);
           // $user = Usuario::orderBy('id')->get();
        }
        
        $roles = Rol::orderBy('id')->get();
//        dd($roles);
        return view('usuarios.usu_form')
                ->with('roles', $roles)
                ->with('user', $user);
    }
    public function view(Request $req, $user = null) {
        if($user){
            $user = Usuario::find($user);
           // $user = Usuario::orderBy('id')->get();
        }
        
        $roles = Rol::orderBy('id')->get();
//        dd($roles);
        return view('usuarios.usu_view')
                ->with('roles', $roles)
                ->with('user', $user);
    }    
    
    public function save(Request $r, $user = null) {

        $r->validate([
            'Nombre'    => 'required|max:255|max:255', 
            'Paterno'    => 'required|max:255|max:255', 
            'Correo'    => 'required|max:255|email', 
        ]);
        
                //$user= new Usuario();
        //$user->Nacimiento=$r->Nacimiento;
       // $user->Nacimiento='20180101';// SimpleDate( $user->Nacimiento);    
        //$r->replace(array('Nacimiento' => '20180101'));

        $user = Usuario::updateOrCreate(['id' => $user?$user:0], $r->all());
        $user->Nacimiento='20180101'; //SimpleDate($r->Fecha);    
        
        $user->Password = md5($r->Password);
        $user->save();
        
//        if($user)
//            $u = Usuario::find($user);
//        else
//            $u = new Usuario();
////        
//        $u->fill($r->all());
//        $u->save();

    }
    
    public function delete($id) {
        $user = Usuario::find($id)->delete();
    }
}

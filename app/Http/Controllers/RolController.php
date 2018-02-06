<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Rol;

class RolController extends Controller
{
    public function index(Request $request) {
        
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Editar", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Nombre", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ro");
        $params[] = array("Header" => "Permisos", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        
//        dd($request->url());
        
    return view('usuarios.rol_index')
                ->with('params', $params);
                
    }
    
    public function data(Request $req) {
        $roles = Rol::all();
        
        $content=  "<?xml version='1.0' encoding='UTF-8'?>\n";
        $content.=  "<rows pos='0'>";
        
        
        foreach($roles as $i => $r){
            $content.= "<row id = '$r->id'>";
            $content.= "<cell>" . ($i+1) . "</cell>";
            $permisosDet=Permiso::wherein('id',$r->Permisos->toArray())->implode("Permiso",',');
            
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-search-plus' onclick='View(" . $r->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-trash-o' onclick='Delete(" . $r->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars($r->Nombre)."</cell>";
            $content.= "<cell>" .htmlspecialchars($permisosDet)."</cell>";
            $content.= "</row>";
        }
            
        $content.=  "</rows>";
        return response($content)->header('Content-Type', 'text/xml');
    }
    
    public function view(Request $req, $user = null) {
        if($user){
            $user = Usuario::find($user);
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
            'RFC'    => 'required|size:13', 
            'Correo'    => 'required|max:255|email', 
            'Password'    => 'required|max:255|confirmed', 
        ]);
        
        $user = Usuario::updateOrCreate(['id' => $user?$user:0], $r->all());
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fraccion;

class FraccionesController extends Controller
{
    public function index() {
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Ver", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ed");
        $params[] = array("Header" => "Fracción", "Width" => "100", "Attach" => "txt", "Align" => "center", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Descripción", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        
        
        return view('catalogos.fracciones_index')
                ->with('params', $params)
                ->with('variable', 1);
    }
        
    public function data(Request $req) {
        $fracciones = Fraccion::all();
        
        $content=  "<?xml version='1.0' encoding='UTF-8'?>\n";
        $content.=  "<rows pos='0'>";
        
        foreach($fracciones as $i => $u){
            $content.= "<row id = '$u->id'>";
            $content.= "<cell>" . ($i+1) . "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-search-plus' onclick='View(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-trash-o' onclick='Delete(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Fraccion)."</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Descripcion)."</cell>";
            $content.= "</row>";
        }
            
        $content.=  "</rows>";
        return response($content)->header('Content-Type', 'text/xml');
    }
    
    public function form($fraccion = null) {
        
        if($fraccion)
            $fraccion = Fraccion::find($fraccion);
        
        return view('catalogos.fracciones_form')
                ->with('fraccion', $fraccion);
    }
    
    public function save(Request $r, $fraccion = null) {
        
        
        $r->validate([
            'Fraccion'    => 'required|max:255', 
            'Descripcion'    => 'required', 
        ]);
        
        $p = Fraccion::updateOrCreate(['id'=>($fraccion?$fraccion:0)], $r->all());
        
//        $puesto = new Puesto($r->all());
//        $puesto->save();
        
    }
    
    public function delete($fraccion) {
        $p = Fraccion::find($fraccion);
        $p->delete();
    }
}

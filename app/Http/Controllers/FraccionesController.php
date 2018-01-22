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
    
    public function data() {
        $fracciones = Fraccion::orderBy('Fraccion')->get();
        
        header("Content-type: text/xml");
    
        print  "<?xml version='1.0' encoding='UTF-8'?>\n";
        print  "<rows pos='0'>";
        
        foreach($fracciones as $d => $p){
            print "<row id = '$p->id'>";
            print "<cell>" . ($d+1) . "</cell>";
            print "<cell>" . htmlspecialchars('<i class="fa fa-2x fa-search-plus" onclick="View(' . $p->id . ')"></i>') . "</cell>";
            print "<cell>" . htmlspecialchars('<i class="fa fa-2x fa-trash-o" onclick="Delete(' . $p->id . ')"></i>') . "</cell>";
            print "<cell>$p->Fraccion</cell>";
            print "<cell>$p->Descripcion</cell>";
            print "</row>";
        }
            
        print  "</rows>";
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dependencia;

class DependenciasController extends Controller
{
    public function index() {
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Ver", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ed");
        $params[] = array("Header" => "Dependencia", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Siglas", "Width" => "100", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        
        
        return view('catalogos.dependencias_index')
                ->with('params', $params)
                ->with('variable', 1);
    }
    
    public function data() {
        $dependencias = Dependencia::orderBy('Dependencia')->get();
        
        header("Content-type: text/xml");
    
        print  "<?xml version='1.0' encoding='UTF-8'?>\n";
        print  "<rows pos='0'>";
        
        foreach($dependencias as $d => $p){
            print "<row id = '$p->id'>";
            print "<cell>" . ($d+1) . "</cell>";
            print "<cell>" . htmlspecialchars('<i class="fa fa-2x fa-search-plus" onclick="View(' . $p->id . ')"></i>') . "</cell>";
            print "<cell>" . htmlspecialchars('<i class="fa fa-2x fa-trash-o" onclick="Delete(' . $p->id . ')"></i>') . "</cell>";
            print "<cell>$p->Dependencia</cell>";
            print "<cell>$p->Siglas</cell>";
            print "</row>";
        }
            
        print  "</rows>";
    }
    
    public function form($dependencia = null) {
        
        if($dependencia)
            $dependencia = Dependencia::find($dependencia);
        
        return view('catalogos.dependencias_form')
                ->with('dependencia', $dependencia);
    }
    
    public function save(Request $r, $dependencia = null) {
        
        
        $r->validate([
            'Dependencia'    => 'required', 
            'Siglas'    => 'required|alpha', 
        ]);
        
        
        $p = Dependencia::updateOrCreate(['id' => $dependencia?$dependencia:0], $r->all());
        
//        $puesto = new Puesto($r->all());
//        $puesto->save();
        
    }
    
    public function delete($dependencia) {
        $p = Dependencia::find($dependencia);
        $p->delete();
    }
}

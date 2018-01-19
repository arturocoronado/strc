<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;

class PuestosController extends Controller
{
    public function index() {
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Ver", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ed");
        $params[] = array("Header" => "Puesto", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Nivel", "Width" => "100", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        
        
        return view('catalogos.puestos_index')
                ->with('params', $params)
                ->with('variable', 1);
    }
    
    public function data() {
        $puestos = Puesto::orderBy('Puesto')->get();
        
        header("Content-type: text/xml");
    
        print  "<?xml version='1.0' encoding='UTF-8'?>\n";
        print  "<rows pos='0'>";
        
        foreach($puestos as $i => $p){
            print "<row id = '$p->id'>";
            print "<cell>" . ($i+1) . "</cell>";
            print "<cell>" . htmlspecialchars('<i class="fa fa-2x fa-search-plus" onclick="View(' . $p->id . ')"></i>') . "</cell>";
            print "<cell>" . htmlspecialchars('<i class="fa fa-2x fa-trash-o" onclick="Delete(' . $p->id . ')"></i>') . "</cell>";
            print "<cell>$p->Puesto</cell>";
            print "<cell>$p->Nivel</cell>";
            print "</row>";
        }
            
        print  "</rows>";
    }
    
    public function form($puesto = null) {
        
        if($puesto)
            $puesto = Puesto::find($puesto);
        
        return view('catalogos.puestos_form')
                ->with('puesto', $puesto);
    }
    
    public function save(Request $r, $puesto = null) {
        
        
        $r->validate([
            'Puesto'    => 'required|max:255', 
            'Nivel'    => 'required', 
        ]);
        
        
        $p = Puesto::updateOrCreate(['id'=>($puesto?$puesto:0)], $r->all());
        
//        $puesto = new Puesto();
//        $puesto->Puesto = $r->Puesto;
//        $puesto->Nivel = $r->Nivel;
//        
//        $puesto->save();
        
    }
    
    public function delete($puesto) {
        $p = Puesto::find($puesto);
        $p->delete();
    }
}

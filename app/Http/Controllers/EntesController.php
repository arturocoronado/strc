<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;

class EntesController extends Controller
{
    public function index() {
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Ver", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ed");
        $params[] = array("Header" => "Ente", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Siglas", "Width" => "100", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Tipo", "Width" => "150", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        
        
        
        return view('catalogos.entes_index')
                ->with('params', $params)
                ->with('variable', 1);
    }
    
    public function data() {
        $entes = Ente::orderBy('Ente')->get();
        
        header("Content-type: text/xml");
    
        print  "<?xml version='1.0' encoding='UTF-8'?>\n";
        print  "<rows pos='0'>";
        
        foreach($entes as $d => $p){
            print "<row id = '$p->id'>";
            print "<cell>" . ($d+1) . "</cell>";
            print "<cell>" . htmlspecialchars('<i class="fa fa-2x fa-search-plus" onclick="View(' . $p->id . ')"></i>') . "</cell>";
            print "<cell>" . htmlspecialchars('<i class="fa fa-2x fa-trash-o" onclick="Delete(' . $p->id . ')"></i>') . "</cell>";
            print "<cell>$p->Ente</cell>";
            print "<cell>$p->Siglas</cell>";
            print "<cell>$p->Tipo</cell>";
            print "</row>";
        }
            
        print  "</rows>";
    }
    
    public function form($ente = null) {
        
        if($ente)
            $ente = Ente::find($ente);
        
        return view('catalogos.entes_form')
                ->with('ente', $ente);
    }
    
    public function save(Request $r, $ente = null) {
        
        
        $r->validate([
            'Ente'    => 'required|max:255',
            'Tipo'    => 'required',
            'Siglas'    => 'required|alpha', 
        ]);
        
        
        $p = Ente::updateOrCreate(['id'=>($ente?$ente:0)], $r->all());

//        $puesto = new Puesto($r->all());
//        $puesto->save();
        
    }
    
    public function delete($ente) {
        $p = Ente::find($ente);
        $p->delete();
    }
}

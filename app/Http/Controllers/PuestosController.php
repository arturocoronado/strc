<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;
use App\Ente;

class PuestosController extends Controller
{
    public function index() {
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Ver", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ed");
        $params[] = array("Header" => "Puesto", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Nivel", "Width" => "100", "Attach" => "txt", "Align" => "center", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Ente", "Width" => "200", "Attach" => "txt", "Align" => "center", "Sort" => "str", "Type" => "ed");
        
        return view('catalogos.puestos_index')
                ->with('params', $params);
    }
        
    public function data(Request $req) {
        $puestos = Puesto::all();
        
        $content=  "<?xml version='1.0' encoding='UTF-8'?>\n";
        $content.=  "<rows pos='0'>";
        
        foreach($puestos as $i => $u){
            $e = Ente::find($u->ente_id);

            $content.= "<row id = '$u->id'>";
            $content.= "<cell>" . ($i+1) . "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-search-plus' onclick='View(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-trash-o' onclick='Delete(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Puesto)."</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Nivel)."</cell>";
            if($u->ente_id == 0){
                $content.= "<cell>Centralizada</cell>";
            }
            else{
                $content.= "<cell>" .htmlspecialchars($e->Siglas)."</cell>";
            }
            $content.= "</row>";
        }
            
        $content.=  "</rows>";
        return response($content)->header('Content-Type', 'text/xml');
    }
    
    public function form($puesto = null) {
        
        if($puesto)
            $puesto = Puesto::find($puesto);
            $entes = Ente::orderBy('id')->get();
        
        return view('catalogos.puestos_form')
                ->with('puesto', $puesto)
                ->with('entes', $entes);
                
    }
    
    public function save(Request $r, $puesto = null) {
        
        
        $r->validate([
            'Puesto'    => 'required|max:255', 
            'Nivel'    => 'required', 
        ]);
        
        
        Puesto::updateOrCreate(['id'=> $puesto], $r->all());
        

    }
    
    public function delete($puesto) {
        Puesto::find($puesto)->delete();
    }
}

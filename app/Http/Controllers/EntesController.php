<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;

class EntesController extends Controller
{
    public function index() {
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Editar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ed");
        $params[] = array("Header" => "Ente", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Siglas", "Width" => "100", "Attach" => "txt", "Align" => "center", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Tipo", "Width" => "150", "Attach" => "cmb", "Align" => "center", "Sort" => "str", "Type" => "ed");
        
        
        
        return view('catalogos.entes_index')
                ->with('params', $params)
                ->with('variable', 1);
    }
        
    public function data(Request $req) {
        $entes = Ente::all();
        
        $content=  "<?xml version='1.0' encoding='UTF-8'?>\n";
        $content.=  "<rows pos='0'>";
        
        foreach($entes as $i => $u){
            $content.= "<row id = '$u->id'>";
            $content.= "<cell>" . ($i+1) . "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-pencil' onclick='View(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-trash-o' onclick='Delete(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Ente)."</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Siglas)."</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Tipo)."</cell>";
            $content.= "</row>";
        }
            
        $content.=  "</rows>";
        return response($content)->header('Content-Type', 'text/xml');
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
        if(auth()->user()->Tipo != "GLOBAL"){
            $new->ente_id = auth()->user()->admin_id;
            $new->save();
        }

//        $puesto = new Puesto($r->all());
//        $puesto->save();
        
    }
    
    public function delete($ente) {
        $p = Ente::find($ente);
        $p->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;

class ContratosController extends Controller
{
    public function index() {
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Ver", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ed");
        $params[] = array("Header" => "Tipo", "Width" => "150", "Attach" => "cmb", "Align" => "center", "Sort" => "str", "Type" => "ed");
        
        
        return view('catalogos.contratos_index')
                ->with('params', $params)
                ->with('variable', 1);
    }
        
    public function data(Request $req) {
        $contratos = Contrato::all();
        
        $content=  "<?xml version='1.0' encoding='UTF-8'?>\n";
        $content.=  "<rows pos='0'>";
        
        foreach($contratos as $i => $u){
            $content.= "<row id = '$u->id'>";
            $content.= "<cell>" . ($i+1) . "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-search-plus' onclick='View(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-trash-o' onclick='Delete(" . $u->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Tipo)."</cell>";
            $content.= "</row>";
        }
            
        $content.=  "</rows>";
        return response($content)->header('Content-Type', 'text/xml');
    }
    
    public function form($contrato = null) {
        
        if($contrato)
            $contrato = Contrato::find($contrato);
        
        return view('catalogos.contratos_form')
                ->with('contrato', $contrato);
    }
    
    public function save(Request $r, $contrato = null) {
        
        
        $r->validate([
            'Tipo'    => 'required',
        ]);
        
        
        $p = Contrato::updateOrCreate(['id'=>($contrato?$contrato:0)], $r->all());
        if(auth()->user()->Tipo != "GLOBAL"){
            $new->ente_id = auth()->user()->admin_id;
            $new->save();
        }

//        $puesto = new Puesto($r->all());
//        $puesto->save();
        
    }
    
    public function delete($contrato) {
        $p = Contrato::find($contrato);
        $p->delete();
    }
}

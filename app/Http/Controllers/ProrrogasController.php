<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prorroga;
use App\Laboral;
use App\Usuario;
use App\Ente;

class ProrrogasController extends Controller
{
    public function index() {
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Editar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ro");
        $params[] = array("Header" => "Borrar", "Width" => "50", "Attach" => "", "Align" => "center", "Sort" => "int", "Type" => "ed");
        $params[] = array("Header" => "Fecha", "Width" => "150", "Attach" => "txt", "Align" => "left", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "RFC", "Width" => "150", "Attach" => "txt", "Align" => "center", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Nombre", "Width" => "*", "Attach" => "txt", "Align" => "center", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Ente", "Width" => "*", "Attach" => "txt", "Align" => "center", "Sort" => "str", "Type" => "ed");
        $params[] = array("Header" => "Estatus", "Width" => "80", "Attach" => "txt", "Align" => "center", "Sort" => "str", "Type" => "ed");
        
        return view('padron.prorrogas_index')
                ->with('params', $params);
    }
        
    public function data(Request $req) {
        $prorrogas = Prorroga::all();
        
        $content=  "<?xml version='1.0' encoding='UTF-8'?>\n";
        $content.=  "<rows pos='0'>";
        
        foreach($prorrogas as $i => $p){
            $l = Laboral::find($p->laboral_id);
            $u = Usuario::find($l->usuario_id);
            $e = Ente::find($l->ente_id);
            
            $content.= "<row id = '$p->id'>";
            $content.= "<cell>" . ($i+1) . "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-pencil' onclick='View(" . $p->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars("<i class='fa fa-2x fa-trash-o' onclick='Delete(" . $p->id . ")'></i>"). "</cell>";
            $content.= "<cell>" .htmlspecialchars($p->Fecha_Pro)."</cell>";
            $content.= "<cell>" .htmlspecialchars($u->RFC)."</cell>";
            $content.= "<cell>" .htmlspecialchars($u->Nombre.' '.$u->Paterno.' '.$u->Materno)."</cell>";
            $content.= "<cell>" .htmlspecialchars($e->Siglas)."</cell>";
            $content.= "<cell>" .htmlspecialchars($p->Estatus)."</cell>";
            $content.= "</row>";
        }
            
        $content.=  "</rows>";
        return response($content)->header('Content-Type', 'text/xml');
    }
    
    public function form($prorroga = null) {
        
        if($prorroga)
            $prorroga = Prorroga::find($prorroga);
        
        return view('padron.prorrogas_form')
                ->with('prorroga', $prorroga);
                
    }
    
    public function save(Request $r, $prorroga = null) {
        
        
        $r->validate([
            'Puesto'    => 'required|max:255', 
            'Nivel'    => 'required', 
        ]);
        
        
        Puesto::updateOrCreate(['id'=> $prorroga], $r->all());
        if(auth()->user()->Tipo != "GLOBAL"){
            $new->ente_id = auth()->user()->admin_id;
            $new->save();
        }
        

    }
    
    public function delete($prorroga) {
        Prorroga::find($prorroga)->delete();
    }
}

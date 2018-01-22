<?php

namespace App\Http\Controllers;

use App\Parametro;
use Illuminate\Http\Request;

class ParametrosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $params[] = array("Header" => "#", "Width" => "40", "Attach" => "", "Align" => "center", "Sort" => "na", "Type" => "ro");
        $params[] = array("Header" => "Opción", "Width" => "*", "Attach" => "", "Align" => "center", "Sort" => "na", "Type" => "ro");
        $params[] = array("Header" => "Valor", "Width" => "*", "Attach" => "", "Align" => "center", "Sort" => "na", "Type" => "ed");
        $params[] = array("Header" => "Descripción", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "na", "Type" => "ro");


        return view('config.parametros_index')
                        ->with('params', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parametros  $parametros
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request) {
        $parametros = Parametro::all()->orderBy('orden', 'asc');

        $content = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $content .= "<rows pos='0'>";


        foreach ($parametros as $i => $p) {
            $content .= "<row id = '$p->id'>";
            $content .= "<cell>" . ($i + 1) . "</cell>";
            $content .= "<cell>" . htmlspecialchars($p->Parametro) . "</cell>";
            $content .= "<cell>" . htmlspecialchars($p->Valor) . "</cell>";
            $content .= "<cell>" . htmlspecialchars($p->Descripcion) . "</cell>";
            $content .= "</row>";
        }

        $content .= "</rows>";
        return response($content)->header('Content-Type', 'text/xml');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parametros  $parametros
     * @return \Illuminate\Http\Response
     */
    public function save(Request $r) {
        Parametro::where('id', $r->id)->update(array('Valor' => $r->valor));
        
        $parametro=Parametro::find($r->id);
        return response()->json($parametro);
    }

}

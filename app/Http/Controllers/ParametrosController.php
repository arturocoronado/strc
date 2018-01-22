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
        $params[] = array("Header" => "Opción", "Width" => "*", "Attach" => "", "Align" => "left", "Sort" => "na", "Type" => "ro");
        $params[] = array("Header" => "Valor", "Width" => "*", "Attach" => "", "Align" => "center", "Sort" => "na", "Type" => "ro");
        $params[] = array("Header" => "Descripción", "Width" => "*", "Attach" => "txt", "Align" => "left", "Sort" => "na", "Type" => "ro");


        return view('config.parametros_index')
                        ->with('params', $params);
    }

    public function edit(Request $r) {
        $parametros = Parametro::orderBy('Orden', 'asc')->get();

        return view('config.parametros_form')
                        ->with('parametros', $parametros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parametros  $parametros
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request) {
        $parametros = Parametro::orderBy('Orden', 'asc')->get();

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
        $parametros = Parametro::all();


        foreach ($parametros as $i => $p) {
            $id = $p->id;
            if ($p->Tipo != 'jpg,png,gif' && $p->Tipo != 'pdf') {
                Parametro::where('id', $id)->update(array('Valor' => $r->$id));
            } else {
                $nombre_archivo = 'f' . $id;
                
                if ($r->hasFile($nombre_archivo)) {
                    $imageName = $nombre_archivo . '.' .$r->file($nombre_archivo)->getClientOriginalExtension();
                    $r->file($nombre_archivo)->store($imageName);
                } else {
                    echo 'no hay archivo '.$nombre_archivo;
                }

                Parametro::where('id', $id)->update(array('Valor' => $imageName));
            }
        }
        $parametros_nuevos = Parametro::all();
        return response()->json($parametros_nuevos);
    }

}

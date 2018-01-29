<?php

namespace App\Http\Controllers;

use App\Parametro;
use Illuminate\Http\Request;
use DB;

class ParametrosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
$ente = auth()->user()->administra();
dd($ente);
        $parametros = $users = DB::table('parametros')
                ->leftJoin('parametros_valores', function($join) {
                    $ente = auth()->user()->administra();
                    $join->on('parametros.id', '=', 'parametros_valores.parametro_id')
                    ->where('parametros_valores.ente_id', '=', $ente);
                })->get();

//                dd($parametros);

        return view('config.parametros_index')
                        ->with('parametros', $parametros);
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
    public function save(Request $r) {
        $ente = auth()->user()->administra();
        
        $parametros = DB::select("Select *from parametros");
        

        foreach ($parametros as $i => $p) {
            $id = 'i_'.$p->id;
            $parametro_valor = DB::select("Select *from parametros_valores where parametro_id =$p->id");
            if (count($parametro_valor)>0){
                DB::update("update parametros_valores set \"Valor\"='".$r->input('$id')."' where  parametro_id =$p->id and ente_id=$ente");
            }else{
                DB::insert("insert into parametros_valores (parametro_id,ente_id,\"Valor\") values($p->id ,$ente,'".$r->input('$id')."')");
            }
            
        }
        $parametros_nuevos = Parametro::all();
        return response()->json($parametros_nuevos);
    }

    public function savemanual(Request $r) {
        $nombre_archivo = 'manualpdf';
        if ($r->hasFile($nombre_archivo)) {

            $imageName = $nombre_archivo . '.' . $r->file($nombre_archivo)->getClientOriginalExtension();

            $r->file($nombre_archivo)->move(
                    base_path() . '/public/archivos/', $imageName
            );
        } else {
            echo 'no hay archivo ' . $nombre_archivo;
        }

        Parametro::where('id', 3)->update(array('Valor' => $imageName));


        $parametros_nuevos = Parametro::where('id', 3)->get();
        return response()->json($parametros_nuevos);
    }

    public function savelogodep(Request $r) {
        $nombre_archivo = 'logodep';
        if ($r->file($nombre_archivo)) {

            $imageName = $nombre_archivo . '.' . $r->file($nombre_archivo)->getClientOriginalExtension();

            $r->file($nombre_archivo)->move(
                    base_path() . '/public/archivos/', $imageName
            );
        } else {
            echo 'no hay archivo ' . $nombre_archivo;
        }

        Parametro::where('id', 14)->update(array('Valor' => $imageName));


        $parametros_nuevos = Parametro::where('id', 14)->get();
        return response()->json($parametros_nuevos);
    }

    public function savelogogob(Request $r) {
        $nombre_archivo = 'logogob';
        if ($r->hasFile($nombre_archivo)) {

            $imageName = $nombre_archivo . '.' . $r->file($nombre_archivo)->getClientOriginalExtension();

            $r->file($nombre_archivo)->move(
                    base_path() . '/public/archivos/', $imageName
            );
        } else {
            echo 'no hay archivo ' . $nombre_archivo;
        }

        Parametro::where('id', 15)->update(array('Valor' => $imageName));


        $parametros_nuevos = Parametro::where('id', 15)->get();
        return response()->json($parametros_nuevos);
    }

}

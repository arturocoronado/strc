<?php

namespace App\Http\Controllers;

use App\Parametro;
use Illuminate\Http\Request;
use DB;
use App\Ente;
class ParametrosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tipo_user =auth()->user()->Tipo;
        $ente = auth()->user()->administra();
        $entes = Ente::orderBy('id')->get();
//        dd($ente);
        $parametros = $users = DB::table('parametros')
                        ->leftJoin('parametros_valores', function($join) {
                            $ente = auth()->user()->administra();
                            $join->on('parametros.id', '=', 'parametros_valores.parametro_id')
                            ->where('parametros_valores.ente_id', '=', $ente);
                        })->get();

//                dd($parametros);

        return view('config.parametros_index')
                        ->with('parametros', $parametros)
                        ->with('tipo_user', $tipo_user)
                        ->with('entes',$entes);
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
            $nombre_input = 'i_' . $p->id;
            if ($r->input($nombre_input)) {
                $parametro_valor = DB::select("Select *from parametros_valores where parametro_id =$p->id and ente_id=$ente");
                if (count($parametro_valor) > 0) {
                    DB::update("update parametros_valores set \"Valor\"='" . $r->input($nombre_input) . "' where  parametro_id =$p->id and ente_id=$ente");
                } else {
                    DB::insert("insert into parametros_valores (parametro_id,ente_id,\"Valor\") values($p->id ,$ente,'" . $r->input($nombre_input) . "')");
                }
            }
        }
        $parametros_nuevos = Parametro::all();
        return response()->json($parametros_nuevos);
    }

    public function savemanual(Request $r) {
        $nombre_archivo = 'manualpdf';
        $imageName = "manualpdf.pdf";
        $ente = auth()->user()->administra();
        if ($r->hasFile($nombre_archivo)) {

            $imageName = $nombre_archivo . '.' . $r->file($nombre_archivo)->getClientOriginalExtension();

            $r->file($nombre_archivo)->move(
                    base_path() . '/public/archivos/', $imageName
            );
        } else {
            echo 'no hay archivo ' . $nombre_archivo;
        }

        $parametro_valor = DB::select("Select *from parametros_valores where parametro_id =3 and ente_id=$ente");

        if (count($parametro_valor) > 0) {
            DB::update("update parametros_valores set \"Valor\"='" . $imageName . "' where  parametro_id =3 and ente_id=$ente");
        } else {
            DB::insert("insert into parametros_valores (parametro_id,ente_id,\"Valor\") values(3 ,$ente,'" . $imageName . "')");
        }


        $parametros_nuevos = $parametro_valor = DB::select("Select *from parametros_valores where parametro_id =3 and ente_id=$ente");
        return response()->json($parametros_nuevos);
    }

    public function savelogodep(Request $r) {
        $nombre_archivo = 'logodep';
        $imageName = "logodep";
        $ente = auth()->user()->administra();
        if ($r->hasFile($nombre_archivo)) {

            $imageName = $nombre_archivo . '.' . $r->file($nombre_archivo)->getClientOriginalExtension();

            $r->file($nombre_archivo)->move(
                    base_path() . '/public/archivos/', $imageName
            );
        } else {
            echo 'no hay archivo ' . $nombre_archivo;
        }

        $parametro_valor = DB::select("Select *from parametros_valores where parametro_id = 14 and ente_id = $ente");

        if (count($parametro_valor) > 0) {
            DB::update("update parametros_valores set \"Valor\"='" . $imageName . "' where  parametro_id =14 and ente_id=$ente");
        } else {
            DB::insert("insert into parametros_valores (parametro_id,ente_id,\"Valor\") values(14 ,$ente,'" . $imageName . "')");
        }


        $parametros_nuevos = $parametro_valor = DB::select("Select *from parametros_valores where parametro_id =14 and ente_id=$ente");
        return response()->json($parametros_nuevos);
    }

    public function savelogogob(Request $r) {
        $nombre_archivo = 'logogob';
        $imageName = "logogob";
        $ente = auth()->user()->administra();
        if ($r->hasFile($nombre_archivo)) {

            $imageName = $nombre_archivo . '.' . $r->file($nombre_archivo)->getClientOriginalExtension();

            $r->file($nombre_archivo)->move(
                    base_path() . '/public/archivos/', $imageName
            );
        } else {
            echo 'no hay archivo ' . $nombre_archivo;
        }

        $parametro_valor = DB::select("Select *from parametros_valores where parametro_id = 15 and ente_id = $ente");

        if (count($parametro_valor) > 0) {
            DB::update("update parametros_valores set \"Valor\"='" . $imageName . "' where  parametro_id =15 and ente_id=$ente");
        } else {
            DB::insert("insert into parametros_valores (parametro_id,ente_id,\"Valor\") values(15 ,$ente,'" . $imageName . "')");
        }


        $parametros_nuevos = $parametro_valor = DB::select("Select *from parametros_valores where parametro_id =15 and ente_id=$ente");
        return response()->json($parametros_nuevos);
    }

}

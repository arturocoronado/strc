<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CalendarController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        dd(auth()->user()->admin_id);
        $ente_id = auth()->user()->admin_id;
        $res = DB::table('calendarios')->where("ente_id", '=', $ente_id)->min('Fecha');
        if ($res == null) {
            $date = new Carbon($res);
            $min = $date->year;
        } else {
            $min = date('Y'); //que ondas
        }


        return view('config.calendario_index')
                        ->with('min', $min);
    }

    public function load(Request $r) {

        $year = $r->year;
        if (!$year)
            $year = Date('Y');
        $data = DB::table('calendarios')
                ->whereYear('Fecha', $year)
                ->get();

        $fechas = array();
        foreach ($data as $d)
            $fechas[] = $d->Fecha;
        echo json_encode($fechas);
    }

    public function save(Request $r) {
        $date = $r->d;
        $ente_id = auth()->user()->admin_id;
        $sql = "insert into calendarios(ente_id, \"Fecha\") values($ente_id,'" . $date . "')";
        $res = DB::Insert($sql);

        return response('', 200);
    }

    public function del(Request $r) {
        $date = $r->d;
        $sql = "delete from calendarios where 'Fecha' = '" . $date . "'";
        $res = DB::Delete($sql);

        return response('', 200);
    }

}

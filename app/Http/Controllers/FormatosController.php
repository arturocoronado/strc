<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Mpdf;
use Illuminate\Support\Facades\URL;

//use App;
class FormatosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = array('data' => 'dsad');


        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
//        echo public_path(). '/css/fonts/formatos';exit;
        $mpdf = new Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/css/fonts/formatos',
            ]),
            'fontdata' => $fontData + [
        'ff1' => [
            'R' => 'f1.ttf',
        ],
        'ff5' => [
            'R' => 'f5.ttf',
        ],
        'ff4' => [
            'R' => 'f4.ttf',
        ],
        'Intro' => [
            'R' => 'IntroRegular.ttf',
            'B' => 'IntroBold.ttf',
        ],
            ]
        ]);

        $mpdf->SetDisplayMode('fullpage');


        $mpdf->AddPage('L', '', '', '', 'on');

        $stylesheet1 = file_get_contents(URL::asset('css/formatos/base.min.css'));
        $mpdf->WriteHTML($stylesheet1, 1);
        $stylesheet2 = file_get_contents(URL::asset('css/formatos/fancy.min.css'));
        $mpdf->WriteHTML($stylesheet2, 1);
        $stylesheet3 = file_get_contents(URL::asset('css/formatos/main.css'));
        $mpdf->WriteHTML($stylesheet3, 1);
        $stylesheet4 = file_get_contents(URL::asset('css/formatos/formatos.css'));
        $mpdf->WriteHTML($stylesheet4, 1);

        $mpdf->WriteHTML(file_get_contents('css/bootstrap.css'), 1);

        $view_p1 = View::make('formatos/formato_inicial_p1', $data);

        $html_p1 = $view_p1->render();
        $mpdf->WriteHTML($html_p1, 2);

        $mpdf->AddPage('', '', '', '', 'on');

        $view_p2 = View::make('formatos/formato_inicial_p2', $data);
        $html_p2 = $view_p2->render();
        $mpdf->WriteHTML($html_p2, 2);
        $mpdf->AddPage('', '', '', '', 'on');


        $footer = "<table width=\"1000\">
                    <tr>
                    <td style='font-size: 18px; padding-bottom: 20px;' align=\"right\">{PAGENO}</td>
                    </tr>
                    </table>";
        $mpdf->SetHTMLFooter($footer);
        $generales = (object) array(
                    'dia_entrega' => 26,
                    'mes_entrega' => 'Noviembre',
                    'anio_entrega' => 2018,
                    'nombres' => 'Jorge Jesús',
                    'ap_paterno' => 'Macias',
                    'ap_materno' => 'Diaz',
                    'curp' => 'ABCD123456789ASD123ASDQ',
                    'rfc' => 'ABCD123456789',
                    'email_trabajo' => 'jjmaciasd@guanajuato.gob.mx',
                    'email_personal' => 'oyejorge@hotmail.com',
                    'edo_civil' => 'CASADOTE',
                    'regimen_matrimoial' => 'Separación de bienes',
                    'pais_nacio' => 'México',
                    'nacionalidad' => 'Mexicana',
                    'entidad_nacio' => 'Guanajuato',
                    'num_cel' => '4737368258',
                    'lugar_ubica' => 'Mexico',
                    'domicilio' => 'Callejón Sta. Monica M3 L29 Col. Modelo',
                    'localidad' => 'Guanajuato',
                    'entidad_federativa' => 'Guanajuato',
                    'municipio' => 'Guanajuato',
                    'cp' => '36000',
                    'tel_lada' => '473 6901391'
        );
        $data['generales'] = $generales;



        $view_p3 = View::make('formatos/formato_inicial_p3', $data);
        $html_p3 = $view_p3->render();
        $mpdf->WriteHTML('<pagebreak resetpagenum="1" pagenumstyle="1" suppress="off" />');
        $mpdf->WriteHTML($html_p3, 2);

        $escolares = array();
        $data['escolares'] = $escolares;

        $mpdf->AddPage();
        $view_p4 = View::make('formatos/formato_inicial_p4', $data);
        $html_p4 = $view_p4->render();
        $mpdf->WriteHTML($html_p4, 2);

        $laborales = array();
        $data['laborales'] = $laborales;

        $mpdf->AddPage();
        $view_p5 = View::make('formatos/formato_inicial_p5', $data);
        $html_p5 = $view_p5->render();
        $mpdf->WriteHTML($html_p5, 2);

        $dependientes = array();
        $data['dependientes'] = $dependientes;

        $mpdf->AddPage();
        $view_p6 = View::make('formatos/formato_inicial_p6', $data);
        $html_p6 = $view_p6->render();
        $mpdf->WriteHTML($html_p6, 2);

        echo $mpdf->Output();

//        echo $html;
    }

}

<?php

  
    function insertIntranet($to, $system, $msg, $link = null, $task = 0, $ref = null){
        $in = new DBConn("INTRANET2");
        $sql = "insert into notificaciones (para, sistema, mensaje, enlace, es_tarea, idref) values("
            . "'" . $to . "', "
            . "'" . $system . "', "
            . "'" . $msg . "', "
            . "'" . $link . "', "
            . $task. ", "
            . ($ref?$ref:"null") . ")";
        $in->execute($sql);
    }
    
    function updateTask($id, $system, $task = 1){
        $in = new DBConn("INTRANET");
        $sql = "update notificaciones set atendido = 1 where sistema = '" . $system . "' and es_tarea = " . $task . " and idref = " . $id;
        $in->execute($sql);
    }
    
    function insertMail($remit, $mail, $subject, $content, $name = null, $program = null){
        $in = new DBConn("INTRANET");
        $sql = "insert into enviacorreos values(NULL, "
                . "NOW(), "
                . ($program?"'" . $program . "'":"NOW()") . ", "
                . "'" . $remit . "', "
                . "'" . $mail . "', "
                . "'" . mysql_escape_string($name) . "', "
                . "'" . mysql_escape_string($subject) . "', "
                . "'" . mysql_escape_string(($content)) . "', "
                . "null, null)";
        $in->execute($sql);
    }
    
    
    function resizeImg($ruta, $nombre, $alto, $ancho, $nombreN, $extension, $calidad){
        $rutaImagenOriginal = $ruta.$nombre;
        if($extension == 'GIF' || $extension == 'gif'){
            $img_original = imagecreatefromgif($rutaImagenOriginal);
        }
        if($extension == 'jpg' || $extension == 'JPG'){
            $img_original = imagecreatefromjpeg($rutaImagenOriginal);
        }
        if($extension == 'png' || $extension == 'PNG'){
            $img_original = imagecreatefrompng($rutaImagenOriginal);
        }
        $max_ancho = $ancho;
        $max_alto = $alto;
        list($ancho,$alto)=getimagesize($rutaImagenOriginal);
        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;
        if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho
            $ancho_final = $ancho;
            $alto_final = $alto;
        } elseif (($x_ratio * $alto) < $max_alto){
            $alto_final = ceil($x_ratio * $alto);
            $ancho_final = $max_ancho;
        } else{
            $ancho_final = ceil($y_ratio * $ancho);
            $alto_final = $max_alto;
        }
        $tmp=imagecreatetruecolor($ancho_final,$alto_final);
        imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
        imagedestroy($img_original);
        return imagejpeg($tmp,$ruta.$nombreN,$calidad);
    }
    
    function UpperCase($str){
        $search = array("á", "é", "í", "ó", "ú", "ñ");
        $rep = array("Á", "É", "Í", "Ó", "Ú", "Ñ");
        $str = str_replace($search, $rep, $str);
        return strtoupper($str);
    }
    
    function LowerCase($str){
        $search = array("Á", "É", "Í", "Ó", "Ú");
        $rep = array("á", "é", "é", "ó", "ú");
        $str = str_replace($search, $rep, $str);
        return strtolower($str);
    }
    
    function getModule(){
        $pos = strrpos($_SERVER['SCRIPT_NAME'], "/");
        $module = substr($_SERVER['SCRIPT_NAME'], $pos + 1, strlen($_SERVER['SCRIPT_NAME']) - $pos);
        return $module;
    }
    
    
    function quitarAcentos($text, $quitspace){
        $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
        $text = strtolower($text);
        $patron = ($quitspace?"/[\, ]+/":"/[\,]+/");
        $patron = array (
                // Espacios, puntos y comas por guion
                 $patron => '_',

                // Vocales
                '/&agrave;/' => 'a',
                '/&egrave;/' => 'e',
                '/&igrave;/' => 'i',
                '/&ograve;/' => 'o',
                '/&ugrave;/' => 'u',

                '/&aacute;/' => 'a',
                '/&eacute;/' => 'e',
                '/&iacute;/' => 'i',
                '/&oacute;/' => 'o',
                '/&uacute;/' => 'u',

                '/&acirc;/' => 'a',
                '/&ecirc;/' => 'e',
                '/&icirc;/' => 'i',
                '/&ocirc;/' => 'o',
                '/&ucirc;/' => 'u',

                '/&atilde;/' => 'a',
                '/&etilde;/' => 'e',
                '/&itilde;/' => 'i',
                '/&otilde;/' => 'o',
                '/&utilde;/' => 'u',

                '/&auml;/' => 'a',
                '/&euml;/' => 'e',
                '/&iuml;/' => 'i',
                '/&ouml;/' => 'o',
                '/&uuml;/' => 'u',

                '/&auml;/' => 'a',
                '/&euml;/' => 'e',
                '/&iuml;/' => 'i',
                '/&ouml;/' => 'o',
                '/&uuml;/' => 'u',

                // Otras letras y caracteres especiales
                '/&aring;/' => 'a',
                '/&ntilde;/' => ($quitspace?'N':'Ñ')

                // Agregar aqui mas caracteres si es necesario

        );
        $text = preg_replace(array_keys($patron),array_values($patron),$text);
        return $text;
    }
    
    function setGrid($grid, $params, $paging = false, $multiline = false){
        $html = $grid . " = new dhtmlXGridObject('" . $grid . "');"
            . $grid . ".setImagePath('".URL::asset('js/dhtmlx/imgs')."/');"
            . $grid . ".enableSmartRendering(true);"
            . $grid . ".setSkin('dhx_skyblue');"
            . $grid . ".setHeader('" . DisplayGrid($params, "Header") . "',null,[" . styleHeaderGrid(count($params)) . "]);"
            . $grid . ".setInitWidths('" . DisplayGrid($params, "Width") . "');"
            . $grid . ".attachHeader('" . DisplayGrid($params, "Attach") . "');"
            . $grid . ".setColAlign('" . DisplayGrid($params, "Align") . "');"
            . $grid . ".setColSorting('" . DisplayGrid($params, "Sort") . "');"
            . $grid . ".setColTypes('" . DisplayGrid($params, "Type") . "');"
            . $grid . ".enableMultiline(" . ($multiline?"true":"false") . ");";
        if($paging){
            $html .=  $grid . ".enablePaging(true,100,null,'pager_" . $grid . "',true,'infopage_" . $grid . "');"
                   . $grid . ".setPagingSkin( 'toolbar', 'dhx_skyblue' );";		 
        }
        $html .= $grid . ".init();"
               . $grid . ".attachEvent('onFilterEnd', function(){ Count(" . $grid . "); });";
        echo $html;	
    }

    function styleHeaderGrid($num){
            $style=str_repeat('"text-align:center;font-size:8pt;font-weight:bold;vertical-align:middle;",',$num); 
            $style=substr($style,0,strlen($style)-1);
            return $style;
    }

    function DisplayGrid($array, $key){
            $val = "";
            for($i=0; $i<count($array)-1; $i++)
                    $val .= ParseFilter($array[$i][$key]) . ",";
            $val .= ParseFilter($array[count($array)-1][$key]);
            return $val;
    }

    function ParseFilter($val){
            switch($val){
                    case "txt": return "#text_filter"; break;
                    case "cmb": return "#select_filter"; break;
                    case "": return ""; break;
                    default: return $val; break;
            }
    }

    function DateFormat($date, $mode){
            $global = explode(" ", $date);
            $d = explode("-", $global[0]);		
            $t = explode(":", $global[1]);
            $time_format = $t[0] . ":" . $t[1];		
            switch($mode){
                    case 1:
                        switch($d[1]){
                                case "01":
                                        $month = "Enero";
                                break;
                                case "02":
                                        $month = "Febrero";
                                break;
                                case "03":
                                        $month = "Marzo";
                                break;
                                case "04":
                                        $month = "Abril";
                                break;
                                case "05":
                                        $month = "Mayo";
                                break;
                                case "06":
                                        $month = "Junio";
                                break;
                                case "07":
                                        $month = "Julio";
                                break;
                                case "08":
                                        $month = "Agosto";
                                break;
                                case "09":
                                        $month = "Septiembre";
                                break;
                                case "10":
                                        $month = "Octubre";
                                break;
                                case "11":
                                        $month = "Noviembre";
                                break;
                                case "12":
                                        $month = "Diciembre";
                                break;
                        }
                        $date_format = $d[2] . " de " . $month . " de " . $d[0];
                        return $date_format;
                    break;
                    case 2:
                            return $time_format;
                    break;
            }		
    }
    
    function getDomain(){
        $protocol = "http" . ($_SERVER['HTTPS']=="on"?"s":"") . "://";
        $domain = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];		
        $pos = strrpos($domain, "/");		
        return $protocol . substr($domain, 0, $pos) . "/";
    }

    function ManageDate($date, $year=0, $month=0, $day=0){
        return date("Y-m-d", strtotime($date . ($year>=0?" + ":" - ") . abs($year) ." year " . ($month>=0?" + ":" - ") . abs($month) . " month " . ($day>=0?" + ":" - ") . abs($day) . " days"));
    }
    
    function Encrypt4Me($str){
         return sha1(md5($str));
    }

    function DayOfWeek($year, $month, $day, $format = 'str'){
         $day = date("w",mktime(0, 0, 0, $month, $day, $year));
         $week = array(1 => "Lunes", 
                       2 => "Martes", 
                       3 => "Miércoles", 
                       4 => "Jueves", 
                       5 => "Viernes", 
                       6 => "Sábado", 
                       7 => "Domingo");
         if($format == 'int')
             return $day;                  
         else
             return $week[$day];
    }
    
    function ClearString($str){
//        return str_replace("\"", "'", eregi_replace("[\n|\r|\n\r]", " ", $str));
//        $search = array("[\n]", "[\r]", "[\n\r]");
//        return eregi_replace($search, " ", $str);
        $buscar=array(chr(13).chr(10), "\r\n", "\n", "\r");
        return str_ireplace($buscar," ",$str);
    }
    
    function format($str, $total, $char){
        $add = "";
        for($i=0; $i<$total - strlen($str); $i++)
                $add .= $char;
        return $add . $str;
    }
    
    function DateDiff($fecha_principal, $fecha_secundaria, $obtener = 'SEGUNDOS', $redondear = false){
        $f0 = strtotime($fecha_principal);
        $f1 = strtotime($fecha_secundaria);
        if ($f0 < $f1) { $tmp = $f1; $f1 = $f0; $f0 = $tmp; }
        $resultado = ($f0 - $f1);
        switch ($obtener) {
            default: break;
            case "MINUTOS"   :   $resultado = $resultado / 60;   break;
            case "HORAS"     :   $resultado = $resultado / 60 / 60;   break;
            case "DIAS"      :   $resultado = $resultado / 60 / 60 / 24;   break;
            case "SEMANAS"   :   $resultado = $resultado / 60 / 60 / 24 / 7;   break;
        }
        if($redondear) $resultado = round($resultado);
        return $resultado;
     }
     
     function SendMail($send, $subject, $name, $text, $attach = null){
            $from = "notificaciones_strc@guanajuato.gob.mx";
            $pass = "AdM1nM@1L001";	
            $mail = new PHPMailer();		
            $mail -> AddAddress ($send);
            $mail -> From = $from;
            $mail -> FromName = "Materiales";		
            $mail -> Subject = utf8_decode($subject);
            $mail -> Body = BodyMail($subject, $name, $text);
            $mail -> IsHTML(true);
            if($attach)
                $mail->AddAttachment($attach, $file);
            $mail->IsSMTP();
//            $mail->SMTPDebug  = 2;  //---->Esta linea es para hacer debug y ver los errores que se generan en el envio del mail.
            $mail->Host = 'ssl://smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = $from;
            $mail->Password = $pass;

            //Se verifica que se haya enviado el correo con el metodo Send().
            return $mail->Send();	
     }
     
     function BodyMail($subject, $name, $text){
            return utf8_decode("<table style = 'border: 2px outset #084773; border-collapse: collapse; font-size: 9pt; '>
                        <tr>
                            <td style = 'border: 2px outset #084773; padding: 5px; text-align: center; '>
                                <p><b>Secretaría de la Transparencia y Rendición de Cuentas </b></p>
                                <p><b>Gobierno del Estado de Guanajuato</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td width = '700' style = 'border: 2px outset #084773; padding: 5px;'><center>" . $subject . "</center></td>
                        </tr>
                        <tr>
                            <td width = '700' style = 'border: 2px outset #084773; padding: 5px;'>
                                <p><b>Estimado(a): " . $name . "</b></p><p>" . $text . "</p>
                            </td>
                        </tr>
                        <tr>
                            <td style = 'color: red'><center><b>Favor de no responder este mensaje</b></center></td>
                        </tr>
                 </table>");
    }
    
    function Month($m){
        $array = array("01" => "Enero", 
                       "02" => "Febrero", 
                       "03" => "Marzo", 
                       "04" => "Abril", 
                       "05" => "Mayo", 
                       "06" => "Junio", 
                       "07" => "Julio", 
                       "08" => "Agosto", 
                       "09" => "Septiembre", 
                       "10" => "Octubre", 
                       "11" => "Noviembre", 
                       "12" => "Diciembre");
        return $array[$m];
    }
    
    function SimpleDate($datetime){
        $xplode = explode(" ", trim($datetime));
        $date = $xplode[0];
        $time = null;
        if(Count($xplode) > 1)
            $time = $xplode[1];
        
        if($date){
            if(substr_count($date, "/"))
                $exp = explode("/", $date);
            else
                $exp = explode("-", $date);
            if(strlen($date[0]) == 4) // 2018/01/01
                return trim($exp[2] . "/" . $exp[1] . "/" . $exp[0] . " " . $time);
            else{
                return trim($exp[0] . "-" . $exp[1] . "-" . $exp[2] . " " . $time);
            }
        }
    }
    
    function SimpleDate2($datetime){
        $xplode = explode(" ", trim($datetime));
        $date = $xplode[0];
        $time = $xplode[1];
        $array = array(
            "01" => "Ene",
            "02" => "Feb", 
            "03" => "Mar", 
            "04" => "Abr", 
            "05" => "May", 
            "06" => "Jun", 
            "07" => "Jul", 
            "08" => "Ago", 
            "09" => "Sep", 
            "10" => "Oct", 
            "11" => "Nov", 
            "12" => "Dic"
        );
        if($date){
            $exp = explode("-", $date);
            if(is_numeric($exp[1]))
                return trim($exp[2] . "-" . $array[$exp[1]] . "-" . $exp[0] . " " . $time);
            else{
                $key = array_keys($array, $exp[1]);
                return trim($exp[2] . "-" . $key[0] . "-" . $exp[0] . " " . $time);
            }
        }
    }
    
    function lastDayMonth($year, $month){
        return date("d",(mktime(0,0,0,$month+1,1,$year)-1));
    }
    
    function ConvertTime($t, $addpoints = false){
        if(strlen($t) < 6)
            $t = format ($t, 6, "0");
        $s = substr($t, 4, 2);
        $m = substr($t, 2, 2);
        $h = substr($t, 0, 2);
        
        $seg = $s % 60;
        $min = ($m % 60) + floor($s / 60);
        $hour = ($h % 24) + floor($m / 60);
        
        return format($hour, 2, "0") . ($addpoints?":":"") .  format($min, 2, "0") . ($addpoints?":":"") . format($seg, 2, "0");
    }
    
    
?>
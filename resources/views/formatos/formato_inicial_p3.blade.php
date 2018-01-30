
<div class="pagina">
    <div style="display: block;width: 500px;height: 50px;"></div>
    <div class="" style="margin: auto;position: absolute;left:0;right: 0;display: block;width: 500px;height: 100px">

    </div>

    <div style="font-family: Intro;display: block;margin: auto; position: absolute;left:0;right: 0;width: 650px;height: 30px;text-align: right">
        DECLARACIÓN DE SITUACIÓN PATRIMONIAL INICIAL
    </div>
    <div style="display: block;margin: auto; position: absolute;left:0;right: 0;width: 650px;height: 30px;text-align: left">
        <p style="font-family: Intro;font-size: 10px">NOTA:SÍRVASE REVISAR  EL INSTRUCTIVO ANTES DE LLENAR EL FORMATO</p>
    </div>
    <div style="border: 1px solid #000;
         border-radius: 5px;display: block;padding: 5px;margin: auto; position: absolute;left:0;right: 0;width: 650px;height: auto;text-align: left">
        <p style="font-family: Intro;font-size: 10px">
            SECRETARÍA DE LA TRANSPARENCIA Y RENDICIÓN DE CUENTAS
        </p>
        <p style="font-family: Intro;font-size: 10px">
            BAJO PROTESTA DE DECIR VERDAD, PRESENTO A USTED MI DECLARACIÓN INICIAL DE SITUACIÓN PATRIMONIAL, CONFORME A LO DISPUESTO.
        </p>
    </div>

    <div style="display: block;width: 500px;height: 5px;"></div>

    <div class="" style="border: 1px solid #000;
         border-radius: 5px;display: block;padding: 5px;margin: auto; position: absolute;left:0;right: 0;width: 650px;height: 100px;">
        <div class="row" style="padding: 5px;">
            <div class="" style="border: 1px solid #000;
                 border-radius: 5px;display: block;padding: 5px;width: 200px;height: auto;margin: 10px;text-align: center;float: left">
                <p>Declaración de Situación Patrimonial Inicial</p>
            </div>
            <div class="" style="display: block;padding: 5px;width: 300px;height: auto;margin: 10px;text-align: center;float: right">
                <table>
                    <tr>
                        <td style="padding: 3px;text-align: right;">Fecha de recepción</td>

                        <td style="padding: 3px;text-align: center;border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;">{{$generales->dia_entrega}}</td>
                        <td style="padding: 3px;text-align: center;border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;">{{$generales->mes_entrega}}</td>
                        <td style="padding: 3px;text-align: center;border-bottom: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;">{{$generales->anio_entrega}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding: 3px;text-align: center;">Día</td>
                        <td style="padding: 3px;text-align: center;">Mes</td>
                        <td style="padding: 3px;text-align: center;">Año</td>

                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <table border="1" style="border: 1px solid 000;width: 563px;height: auto;">
d
                    <tr style="border: 1px solid 000">
                        <th style="border: 1px solid 000;text-align: center" colspan="3">DATOS GENERALES DEL DECLARANTE</th>
                    </tr>

                    <tr style="border: 1px solid 000">
                        <th style="border: 1px solid 000;text-align: center">Nombre(s)</th>
                        <th style="border: 1px solid 000;text-align: center">Primer apellido</th>
                        <th style="border: 1px solid 000;text-align: center">Segundo apellido</th>
                    </tr>
                    <tr>
                        <td style="border: 1px solid 000;text-align: center">{{$generales->nombres}}</td>
                        <td style="border: 1px solid 000;text-align: center">{{$generales->ap_paterno}}</td>
                        <td style="border: 1px solid 000;text-align: center">{{$generales->ap_materno}}</td>
                    </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 10px">
            <table border="1" style="border: 1px solid 000;width: 563px;height: auto;">
d
                    <tr style="border: 1px solid 000">
                        <th style="border: 1px solid 000;text-align: center" colspan="4">CURP</th>
                        <th style="border: 1px solid 000;text-align: center" colspan="4">RFC/HOMOCLAVE</th>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;text-align: center" colspan="4">{{$generales->curp}}</td>
                        <td style="border: 1px solid 000;text-align: center" colspan="4">{{$generales->rfc}}</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;" colspan="4">Correo Electrónico laboral: {{$generales->email_trabajo}}</td>
                        <td style="border: 1px solid 000;" colspan="4">Correo Electrónico personal: {{$generales->email_personal}}</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <th style="border: 1px solid 000;text-align: center" colspan="2">ESTADO CIVIL</th>
                        <th style="border: 1px solid 000;text-align: center" colspan="2">RÉGIMEN MATRIMONIAL</th>
                        <td style="border: 1px solid 000;text-align: center" colspan="2">País donde nació</td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2">Nacionalidad</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;text-align: center" colspan="2">{{$generales->edo_civil}}</td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2">{{$generales->regimen_matrimoial}}</td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2">{{$generales->pais_nacio}}</td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2">{{$generales->nacionalidad}}</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;text-align: center" colspan="2"></td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2"></td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2">Entidad donde nació</td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2">Número de Celular</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;text-align: center" colspan="2"></td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2"></td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2">{{$generales->entidad_nacio}}</td>
                        <td style="border: 1px solid 000;text-align: center" colspan="2">{{$generales->num_cel}}</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;text-align: center" colspan="4">DOMICILIO</td>
                        <td style="border: 1px solid 000;text-align: left" colspan="4">Lugar donde se ubica: {{$generales->lugar_ubica}}</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;text-align: left" colspan="8">
                            Domicilio Particular: calle,número exterior e interior: {{$generales->domicilio}}</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;text-align: left" colspan="4">Localidad o Colonia: {{$generales->localidad}}</td>
                        <td style="border: 1px solid 000;text-align: left" colspan="4">Entidad Federativa: {{$generales->entidad_federativa}}</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;text-align: left" colspan="4">Municipio o Alcaldia: {{$generales->municipio}}</td>
                        <td style="border: 1px solid 000;text-align: left" colspan="4">Código Postal: {{$generales->cp}}</td>
                    </tr>
                    <tr style="border: 1px solid 000">
                        <td style="border: 1px solid 000;text-align: left" colspan="8">Teléfono con clave lada: {{$generales->tel_lada}}</td>
                    </tr>
            </table>
        </div>
    </div>

</div>

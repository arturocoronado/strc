@extends ('base')

@section ('title', 'Configuración del sistema')

@section ('style') 

<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin-bottom: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    .main-nav>ul>li.active>a:before, .main-nav>ul>li:hover>a:before, .main-nav>ul>li:focus>a:before, .btn-primary.disabled.focus, .btn-primary.disabled:hover, #header.static-header, #header.sticky-header .main-nav ul>li>a:hover:before, #header.sticky-header .main-nav ul>li.active>a:before, .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover, .most-popular article .tag, .social-feedback .icon, .owl-dot span, .tabbed-about-us .tabs-nav li:after, .single-post .tag, ul.pagination>li.active>a, .input:after, .post-caption .post-tag, .team-slider-thumb .thumb:after, .footer-logo {
        background: #fff;
    }
    .tab-content {
        padding: 6px 12px;
    }
</style>

@endsection 

@section ('script')


@endsection



@section ('content')

<div>
    @if ($tipo_user=== 'GLOBAL')
    <div style="display:block;float: right"> 
        <div class="form-group">
            <label>Ente</label>
            <select id='select' class="" name="ente_id" required="" style="width: 550px">
                <option value="" selected>Seleccione</option>
                <optgroup label="Centralizada">
                    <option value="0"> Todas las dependencias</option>
                </optgroup>
                <optgroup label="Paraestatal">
                    @foreach($entes as $e)
                    @if($e->Tipo=='Paraestatal')
                    <option value="{{$e->id}}"> {{$e->Ente}}</option>
                    @endif
                    @endforeach
                </optgroup>
                <optgroup label="Municipio">
                    @foreach($entes as $e)
                    @if($e->Tipo=='Municipio')
                    <option value="{{$e->id}}"> {{$e->Ente}}</option>
                    @endif
                    @endforeach     
                </optgroup>
            </select>
        </div>
    </div>
    @endif
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#grales" aria-controls="grales" role="tab" data-toggle="tab">Generales</a>
        </li>
        <li role="presentation"><a href="#correo" aria-controls="correo" role="tab" data-toggle="tab">Correo</a></li>
        <li role="presentation"><a href="#archivos" aria-controls="archivos" role="tab" data-toggle="tab">Archivos</a></li>


    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="grales">
            <form id="frmParametrosGrales" enctype="multipart/form-data" method="post" name="frmParametrosGrales">
                {{ csrf_field() }}
                @foreach ($parametros as $k=>$v)
                @if ($v->Categoria == 'Generales')


                <div class="form-group">

                    @switch($v->Tipo)
                    @case('textarea')
                    <label for="{{$k}}Input">{{$v->Parametro}}</label>
                    <textarea id="{{$k}}Input" class="form-control" name="i_{{$v->id}}" required="required">{{$v->Valor}}</textarea>
                    <p class="help-block">{{$v->Descripcion}}</p>
                    @break

                    @case('text')
                    <label for="{{$k}}Input">{{$v->Parametro}}</label>
                    <input type="{{$v->Tipo}}" class="form-control" name="i_{{$v->id}}" id="{{$k}}Input" value="{{$v->Valor}}" required="required">
                    <p class="help-block">{{$v->Descripcion}}</p>
                    @break
                    @case('email')
                    <label for="{{$k}}Input">{{$v->Parametro}}</label>
                    <input type="{{$v->Tipo}}" class="form-control" name="i_{{$v->id}}" id="{{$k}}Input" value="{{$v->Valor}}" required="required">
                    <p class="help-block">{{$v->Descripcion}}</p>
                    @break
                    @case('password')
                    <label for="{{$k}}Input">{{$v->Parametro}}</label>
                    <input type="{{$v->Tipo}}" class="form-control" name="i_{{$v->id}}" id="{{$k}}Input" value="{{$v->Valor}}" required="required">
                    <p class="help-block">{{$v->Descripcion}}</p>
                    @break
                    @default

                    @endswitch

                </div>
                @endif
                @endforeach
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="correo">
            <form id="frmParametrosCorreo" enctype="multipart/form-data" method="post" name="frmParametrosCorreo">
                {{ csrf_field() }}
                @foreach ($parametros as $k=>$v)
                @if ($v->Categoria == 'Correo')


                <div class="form-group">

                    @switch($v->Tipo)
                    @case('textarea')
                    <label for="{{$k}}Input">{{$v->Parametro}}</label>
                    <textarea id="{{$k}}Input" class="form-control" name="i_{{$v->id}}" required="required">{{$v->Valor}}</textarea>
                    <p class="help-block">{{$v->Descripcion}}</p>
                    @break

                    @case('text')
                    <label for="{{$k}}Input">{{$v->Parametro}}</label>
                    <input type="{{$v->Tipo}}" class="form-control" name="i_{{$v->id}}" id="{{$k}}Input" value="{{$v->Valor}}" required="required">
                    <p class="help-block">{{$v->Descripcion}}</p>
                    @break

                    @case('password')
                    <label for="{{$k}}Input">{{$v->Parametro}}</label>
                    <input type="{{$v->Tipo}}" class="form-control" name="i_{{$v->id}}" id="{{$k}}Input" value="{{$v->Valor}}" required="required">
                    <p class="help-block">{{$v->Descripcion}}</p>
                    @break
                    @default

                    @endswitch

                </div>
                @endif
                @endforeach
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>

        </div>
        <div role="tabpanel" class="tab-pane tab-content" id="archivos">

            <div class="row">
                <form name="frm_manualpdf" method="post" enctype="multipart/form-data" class="col-sm-4" style="text-align: center">
                    <div class="fileUpload btn btn-primary">
                        <span>Seleccione el manual de usuario</span>
                        <input type="file"
                               class="form-control col-sm-6 upload"
                               id="manualpdf"
                               name="manualpdf"
                               placeholder="" accept="application/pdf" required style="width: 100%">

                    </div>

                    <p class="help-block" id="helpmanual">
                    <ul class="list-group"><li class="list-group-item list-group-item-success" style="text-align: center;">
                            <a href="{{url('archivos/'.$parametros[2]->Valor)}}" target="_blank" class="archivo_subido_form" id="helpmanual_a">Descargar</a></li></ul>
                    </p>
                </form>

                <form name="frm_logogob" method="post" enctype="multipart/form-data" class="col-sm-4" style="text-align: center">
                    <div class="fileUpload btn btn-success">
                        <span>Seleccione el logo de gobierno</span>
                        <input type="file"
                               class="form-control col-sm-6 upload"
                               id="logogob"
                               name="logogob"
                               placeholder="" accept="image/x-png,image/gif,image/jpeg" required style="width: 100%">

                    </div>
                    <p class="help-block" id="helplogogob">
                    <ul class="list-group"><li class="list-group-item list-group-item-success"  style="text-align: center;">
                            <a href="{{url('archivos/'.$parametros[13]->Valor)}}" target="_blank" class="archivo_subido_form" id="helplogogob_a">Ver</a></li></ul>
                    </p>
                </form>
                <form name="frm_logodep" method="post" enctype="multipart/form-data" class="col-sm-4" style="text-align: center;">
                    <div class="fileUpload btn btn-info">
                        <span>Logo de la dependencia</span>
                        <input type="file"
                               class="form-control col-sm-6 upload"
                               id="logodep"
                               name="logodep"
                               placeholder="" accept="image/x-png,image/gif,image/jpeg" required style="width: 100%">

                    </div>
                    <p class="help-block" id="helplogodep">
                    <ul class="list-group"><li class="list-group-item list-group-item-success"  style="text-align: center;">
                            <a href="{{url('archivos/'.$parametros[14]->Valor)}}" target="_blank" class="archivo_subido_form" id="helplogodep_a">Ver</a></li></ul>
                    </p>

                </form>
            </div>
        </div>

    </div>
    <script>
        var formGrales = document.forms.namedItem("frmParametrosGrales");
        formGrales.addEventListener('submit', function (ev) {
            oData = new FormData(formGrales);
            var oReq = new XMLHttpRequest();
            oReq.open("POST", "opciones/save", true);
            oReq.onload = function (oEvent) {
                Ready();
                OK("Datos actualizados");
                CloseModal();
            };
            oReq.send(oData);
//        oReq.done(function (res) {

//        })
            ev.preventDefault();
        }, false);
        var formCorreo = document.forms.namedItem("frmParametrosCorreo");
        formCorreo.addEventListener('submit', function (ev) {
            oData = new FormData(formCorreo);
            var oReq = new XMLHttpRequest();
            oReq.open("POST", "opciones/save", true);
            oReq.onload = function (oEvent) {
                Ready();
                OK("Datos actualizados");
                CloseModal();
            };
            oReq.send(oData);
//        oReq.done(function (res) {

//        })
            ev.preventDefault();
        }, false);
        $("#manualpdf").on('change', function (e) {
            var oData = new FormData(document.forms.namedItem("frm_manualpdf"));
            $.ajax({
                url: "opciones/save_manual",
                type: "POST",
                contentType: false,
                data: oData,
                processData: false,
                cache: false,
            })
                    .done(function (res, textStatus, jqXHR) {
                        var data = res[0];
                        $("#manualpdf").val();
                        OK("Manual subido!");
                        $("#helpmanual_a").attr('href', '{{url("archivos/")}}/' + data.Valor);
                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        console.log("La solicitud a fallado: " + textStatus);
                    });
        });
        $("#logodep").on('change', function (e) {
            var oData = new FormData(document.forms.namedItem("frm_logodep"));
            $.ajax({
                url: "opciones/savelogodep",
                type: "POST",
                contentType: false,
                data: oData,
                processData: false,
                cache: false,
            })
                    .done(function (res, textStatus, jqXHR) {
                        var data = res[0];
                        $("#logodep").val();
                        OK("Logo actualizado!")

                        $("#helplogodep_a").attr('href', '{{url("archivos/")}}/' + data.Valor);


                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        console.log("La solicitud a fallado: " + textStatus);
                    });
        });
        $("#logogob").on('change', function (e) {
            var oData = new FormData(document.forms.namedItem("frm_logogob"));
            $.ajax({
                url: "opciones/savelogogob",
                type: "POST",
                contentType: false,
                data: oData,
                processData: false,
                cache: false,
            })
                    .done(function (res, textStatus, jqXHR) {
                        var data = res[0];
                        $("#logogob").val();
                        OK("Logo actualizado!");
                        $("#helplogogob_a").attr('href', '{{url("archivos/")}}/' + data.Valor);
                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        console.log("La solicitud a fallado: " + textStatus);
                    });
        });
    </script>

    @endsection 

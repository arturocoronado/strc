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
</style>
<div class="row">
    <form name="frm_manualpdf" method="post" enctype="multipart/form-data" class="col-sm-4">
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
                <a href="{{url('archivos/'.$parametros[4]->Valor)}}" target="_blank" class="archivo_subido_form" id="helpmanual_a">Descargar</a></li></ul>
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
                <a href="{{url('archivos/'.$parametros[14]->Valor)}}" target="_blank" class="archivo_subido_form" id="helplogogob_a">Ver</a></li></ul>
        </p>
    </form>

    <form name="frm_logodep" method="post" enctype="multipart/form-data" class="col-sm-4">
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
                <a href="{{url('archivos/'.$parametros[13]->Valor)}}" target="_blank" class="archivo_subido_form" id="helplogodep_a">Ver</a></li></ul>
        </p>
    </form>
</div>


<form id="frmParametros" enctype="multipart/form-data" method="post" name="frmParametros">
    {{ csrf_field() }}
    @foreach ($parametros as $k=>$v)
    <div class="form-group">

        @switch($v->Tipo)
        @case('textarea')
        <label for="{{$k}}Input">{{$v->Parametro}}</label>
        <textarea id="{{$k}}Input" class="form-control" name="{{$v->id}}" required="required">{{$v->Valor}}</textarea>
        <p class="help-block">{{$v->Descripcion}}</p>
        @break

        @case('text')
        <label for="{{$k}}Input">{{$v->Parametro}}</label>
        <input type="{{$v->Tipo}}" class="form-control" name="{{$v->id}}" id="{{$k}}Input" value="{{$v->Valor}}" required="required">
        <p class="help-block">{{$v->Descripcion}}</p>
        @break
        @case('password')
        <label for="{{$k}}Input">{{$v->Parametro}}</label>
        <input type="{{$v->Tipo}}" class="form-control" name="{{$v->id}}" id="{{$k}}Input" value="{{$v->Valor}}" required="required">
        <p class="help-block">{{$v->Descripcion}}</p>
        @break
        @default

        @endswitch

    </div>
    @endforeach
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>

<script>

    var form = document.forms.namedItem("frmParametros");
    form.addEventListener('submit', function (ev) {
        oData = new FormData(form);
        var oReq = new XMLHttpRequest();
        oReq.open("POST", "opciones/save", true);
        oReq.onload = function (oEvent) {
            Ready();
            OK("Configuración actualizada");
            CloseModal();
            ReloadGrid(grid, 'opciones/data');
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
                    alert(data.Valor)
                    $("#helplogogob_a").attr('href', '{{url("archivos/")}}/' + data.Valor);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.log("La solicitud a fallado: " + textStatus);
                });
    });
</script>
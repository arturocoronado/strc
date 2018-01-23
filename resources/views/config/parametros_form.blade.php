<form id="frmParametros" enctype="multipart/form-data" method="post" name="frmParametros">
    {{ csrf_field() }}
    @foreach ($parametros as $k=>$v)
    <div class="form-group">
        <label for="{{$k}}Input">{{$v->Parametro}}</label>
        @switch($v->Tipo)
        @case('pdf')
        <input type="file" id="{{$k}}Input" name="f{{$v->id}}" accept="application/pdf" required="required" />

        <p class="help-block">{{$v->Descripcion}}</p>
        @break
        @case('jpg,png,gif')
        <input type="file" id="{{$k}}Input" name="f{{$v->id}}" accept="image/x-png,image/gif,image/jpeg" required="required" />
        <p class="help-block">{{$v->Descripcion}}</p>
        @break
        @case('textarea')
        <textarea id="{{$k}}Input" class="form-control" name="{{$v->id}}" required="required">{{$v->Valor}}</textarea>
        <p class="help-block">{{$v->Descripcion}}</p>
        @break

        @default
        <input type="{{$v->Tipo}}" class="form-control" name="{{$v->id}}" id="{{$k}}Input" value="{{$v->Valor}}" required="required">
        <p class="help-block">{{$v->Descripcion}}</p>
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
            console.log(oReq.status);
        };

        oReq.send(oData);
        ev.preventDefault();
    }, false);

//    $("#frmParametros").on('submit', function (e) {
//        e.preventDefault();
//        var data = $(this).serialize();
//        $.post('opciones/save', data, function (res) {
//            console.log(res);
//        }, 'json');
//    });
</script>
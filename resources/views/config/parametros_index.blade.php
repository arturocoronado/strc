@extends ('base')

@section ('title', 'Configuración del sistema')

@section ('style') 

<style type="text/css">

</style>

@endsection 

@section ('script')

<script>
    var grid;


    $(function () {

        {!! setGrid("grid", $params) !!}
        $('#btnEdit').click(function () {
            Modal('opciones/edit/', 'Opciones de configuración', 700);
        });
        ReloadGrid(grid, "opciones/data", function () {
//            grid.attachEvent("onCellChanged", function (rId, cInd, nValue) {
//
//                $.post('opciones/save', {id: rId, valor: nValue}, function (res) {
//                    console.log(res);
//                }, 'json');
//
//
//
//            });
        });

    });


    function View(id) {
    }




</script>

@endsection



@section ('content')
<p>
    <button id="btnEdit" class="btn btn-primary"><i class="fa fa-plus"></i> Actualizar</button>
</p>
<br>

<table width="100%"  cellpadding="0" cellspacing="0">		
    <tr>
        <td id="pager_grid"></td>
    </tr>
    <tr>
        <td><div id="infopage_grid" style =""></div></td>
    </tr>
    <tr>
        <td><div id="grid" style ="height: 300px; width: 100%"></div></td>
    </tr>
    <tr>
        <td class = "RowCount"></td>
    </tr>
</table>

@endsection 

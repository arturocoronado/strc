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

        ReloadGrid(grid, "opciones/data", function () {
            grid.attachEvent("onCellChanged", function (rId, cInd, nValue) {

                $.post('opciones/save', {id: rId, valor: nValue}, function (res) {
                    console.log(res);
                }, 'json');



            });
        });

    });

    function View(id) {
    }




</script>

@endsection



@section ('content')

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

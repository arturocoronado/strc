
@extends('base')

@section('title', 'Catálogos de fracciones')

@section('style')

<style type="text/css">
    
</style>

@endsection

@section('script')

<script>
    var grid;
    $(function(){
    
        {!! setGrid("grid", $params, true) !!}
        
        ReloadGrid(grid, '/catalogos/fracciones/data');
         
        $('#btnNew').click(function(){
           
           Modal('/catalogos/fracciones/form', 'Fracción', 600);
           
        });
    });
    
    function View(id){
        Modal('/catalogos/fracciones/form/' + id, 'Fracción', 600);
    }
    
    function Delete(id){
        Question("¿Desea borrar?", function(){
           Loading();
           $.get('/catalogos/fracciones/delete/' + id, function(data){
              Ready();
              OK("Borrado");
              ReloadGrid(grid, '/catalogos/fracciones/data');
           });
        });
    }
</script>

@endsection 

@section('content')

<p>
    <button id="btnNew" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</button>
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
         <td><div id="grid" style ="height: 400px; width: 100%"></div></td>
    </tr>
    <tr>
         <td class = "RowCount"></td>
    </tr>
</table>

@endsection
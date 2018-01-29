@extends ('base')

@section ('title', 'Lista de Roles')

@section ('style') 

<style type="text/css">
    
</style>

@endsection 

@section ('script')

<script>
    var grid;
    $(function(){
        {!! setGrid("grid", $params) !!} 
        ReloadGrid(grid, "roles/data");        
        $('#btnNew').click(function(){
            Modal('roles/form/', 'Usuario', 700);
        });
    });
    
    function View(id){
        Modal('/roles/view/' + id, 'Usuario', 700);
    }
    function Edit(id){
        Modal('/roles/form/' + id, 'Usuario', 700);
    }    
    
    function Delete(id){

        Question( "Desea borrar?", function(){
           Loading();
           $.get('/usuarios/roles/delete/' + id, function(data){
              Ready();
              if(data)
                  Error(data);
              else{
                  OK("Borrado");
                  ReloadGrid(grid, '/usuarios/roles/data');
              }
           });
        });
    }
</script>

@endsection



@section ('content')

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
         <td><div id="grid" style ="height: 300px; width: 100%"></div></td>
    </tr>
    <tr>
         <td class = "RowCount"></td>
    </tr>
</table>

@endsection 

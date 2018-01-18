
<script>
    $(function(){
        $('#dependencia-form').submit(function(e){
            e.preventDefault();
            
            LoadButton($('#btnSave'));
            $.post($(this).attr('action'), $(this).serialize(), function(data){
                Ready();
                OK("Guardado");
                CloseModal();
                ReloadGrid(grid, '/catalogos/dependencias/data');
            }).fail(function(err){
               Ready(); 
               Error(DisplayErrors(err));
            });
        });
        
        
    });
</script>

<form id ="dependencia-form" action="{{route('catalogos.dependencias.save', $dependencia)}}">
    <div class="form-group">
        <label>Dependencia</label>
        <input type="text" class="form-control" name="Dependencia" placeholder="Nombre de la dependencia" value="{{$dependencia ? $dependencia->Dependencia : ""}}" required="">
    </div>
    <div class="form-group">
        <label>Siglas</label>
        <input type="text" class="form-control" name="Siglas" placeholder="Siglas" value="{{$dependencia ? $dependencia->Siglas : ""}}" required="">
    </div>
    <p><button type="submit" class="btn btn-success btn-lg" id ="btnSave"><i class="fa fa-save"></i> Guardar</button></p>
</form>

<script>
    $(function(){
        $('#contratacion-form').submit(function(e){
            e.preventDefault();
            
            LoadButton($('#btnSave'));
            $.post($(this).attr('action'), $(this).serialize(), function(data){
                Ready();
                OK("Guardado");
                CloseModal();
                ReloadGrid(grid, '/catalogos/contrataciones/data');
            }).fail(function(err){
               Ready(); 
               Error(DisplayErrors(err));
            });
        });
        
        
    });
</script>

<form id ="contratacion-form" action="{{route('catalogos.contrataciones.save', $contratacion)}}">
    <div class="form-group">
        <label>Tipo</label>
        <input type="text" class="form-control" name="Tipo" placeholder="Nombre del tipo de contratación" value="{{$contratacion ? $contratacion->Tipo : ""}}" required="">
    </div>  
    <p><button type="submit" class="btn btn-success btn-lg" id ="btnSave"><i class="fa fa-save"></i> Guardar</button></p>
</form>
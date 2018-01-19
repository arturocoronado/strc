
<script>
    $(function(){
        $('#fraccion-form').submit(function(e){
            e.preventDefault();
            
            LoadButton($('#btnSave'));
            $.post($(this).attr('action'), $(this).serialize(), function(data){
                Ready();
                OK("Guardado");
                CloseModal();
                ReloadGrid(grid, '/catalogos/fracciones/data');
            }).fail(function(err){
               Ready(); 
               Error(DisplayErrors(err));
            });
        });
        
        
    });
</script>

<form id ="fraccion-form" action="{{route('catalogos.fracciones.save', $fraccion)}}">
    <div class="form-group">
        <label>Fracción</label>
        <input type="text" class="form-control" name="Fraccion" placeholder="Fracción" value="{{$fraccion ? $fraccion->Fraccion : ""}}" required="">
    </div>
    <div class="form-group">
        <label>Descripción</label>
        <input type="text" class="form-control" name="Descripcion" placeholder="Descripción" value="{{$fraccion ? $fraccion->Descripcion : ""}}" required="">
    </div>
    <p><button type="submit" class="btn btn-success btn-lg" id ="btnSave"><i class="fa fa-save"></i> Guardar</button></p>
</form>
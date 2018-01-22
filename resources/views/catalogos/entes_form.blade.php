
<script>
    $(function(){
        $('#ente-form').submit(function(e){
            e.preventDefault();
            
            LoadButton($('#btnSave'));
            $.post($(this).attr('action'), $(this).serialize(), function(data){
                Ready();
                OK("Guardado");
                CloseModal();
                ReloadGrid(grid, '/catalogos/entes/data');
            }).fail(function(err){
               Ready(); 
               Error(DisplayErrors(err));
            });
        });
        
        
    });
</script>

<form id ="ente-form" action="{{route('catalogos.entes.save', $ente)}}">
    <div class="form-group">
        <label>Ente</label>
        <input type="text" class="form-control" name="Ente" placeholder="Nombre del ente" value="{{$ente ? $ente->Ente : ""}}" required="">
    </div>
    <div class="form-group">
        <label>Siglas</label>
        <input type="text" class="form-control" name="Siglas" placeholder="Siglas" value="{{$ente ? $ente->Siglas : ""}}" required="">
    </div>
    <div class="form-group">
        <label>Tipo</label>

      <select class="select2 require" id="cmbType" name="Tipo" style="width: 150px">
          <option value ="Centralizada" {{ $ente['Tipo']=="Centralizada" ? "selected" : "" }}>Centralizada</option>
            <option value ="Paraestatal" {{ $ente['Tipo']=="Paraestatal" ? "selected" : "" }}>Paraestatal</option>
            <option value ="Municipio" {{ $ente['Tipo']=="Municipio" ? "selected" : "" }} >Municipio</option>
      </select>
        
    </div>
    
    
    <p><button type="submit" class="btn btn-success btn-lg" id ="btnSave"><i class="fa fa-save"></i> Guardar</button></p>
</form>
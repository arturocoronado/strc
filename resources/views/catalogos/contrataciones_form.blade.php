
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

      <select class="form-control" id="cmbType" name="Tipo" required="">
          <option value ="Honorarios" {{ $contratacion['Tipo']=="Honorarios" ? "selected" : "" }}>Honorarios</option>
            <option value ="Municipal" {{ $contratacion['Tipo']=="Municipal" ? "selected" : "" }}>Municipal</option>
            <option value ="Estatal" {{ $contratacion['Tipo']=="Estatal" ? "selected" : "" }} >Estatal</option>
            <option value ="Federal" {{ $contratacion['Tipo']=="Federal" ? "selected" : "" }} >Federal</option>
      </select>
        
    </div>
    
    
    <p><button type="submit" class="btn btn-success btn-lg" id ="btnSave"><i class="fa fa-save"></i> Guardar</button></p>
</form>
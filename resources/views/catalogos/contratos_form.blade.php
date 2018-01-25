
<script>
    $(function(){
        $('#contrato-form').submit(function(e){
            e.preventDefault();
            
            LoadButton($('#btnSave'));
            $.post($(this).attr('action'), $(this).serialize(), function(data){
                Ready();
                OK("Guardado");
                CloseModal();
                ReloadGrid(grid, '/catalogos/contratos/data');
            }).fail(function(err){
               Ready(); 
               Error(DisplayErrors(err));
            });
        });
        
        
    });
</script>

<form id ="contrato-form" action="{{route('catalogos.contratos.save', $contrato)}}">

    <div class="form-group">
        <label>Tipo</label>

      <select class="form-control" id="cmbType" name="Tipo" required="">
          <option value ="Honorarios" {{ $contrato['Tipo']=="Honorarios" ? "selected" : "" }}>Honorarios</option>
            <option value ="Municipal" {{ $contrato['Tipo']=="Municipal" ? "selected" : "" }}>Municipal</option>
            <option value ="Estatal" {{ $contrato['Tipo']=="Estatal" ? "selected" : "" }} >Estatal</option>
            <option value ="Federal" {{ $contrato['Tipo']=="Federal" ? "selected" : "" }} >Federal</option>
      </select>
        
    </div>
    
    
    <p><button type="submit" class="btn btn-success btn-lg" id ="btnSave"><i class="fa fa-save"></i> Guardar</button></p>
</form>
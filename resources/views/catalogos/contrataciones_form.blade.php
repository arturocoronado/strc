
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
    @if(auth()->user()->Tipo == "GLOBAL")
    <div class="form-group">
        <label>Ente</label>
        <select id="select" class="form-control" name="ente_id" required="" style="width: 550px">
                <option value="" selected>Seleccione</option>
            <optgroup label="Centralizada">
                <option value="0"> Todas las dependencias</option>
           </optgroup>
           <optgroup label="Paraestatal">
           @foreach($entes as $e)
            @if($e->Tipo=='Paraestatal')
                <option value="{{$e->id}}" {{($contratacion && $e->id == $contratacion->ente_id ? "selected":"")}} > {{$e->Ente}}</option>
            @endif
           @endforeach
           </optgroup>
           <optgroup label="Municipio">
           @foreach($entes as $e)
            @if($e->Tipo=='Municipio')
                <option value="{{$e->id}}" {{($contratacion && $e->id == $contratacion->ente_id ? "selected":"")}} > {{$e->Ente}}</option>
            @endif
           @endforeach     
           </optgroup>
        </select>
    </div>
    @endif
    <p><button type="submit" class="btn btn-success btn-lg" id ="btnSave"><i class="fa fa-save"></i> Guardar</button></p>
</form>
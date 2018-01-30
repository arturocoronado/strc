
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
        
    DoSelect('#select');  
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
    @if(auth()->user()->Tipo == "GLOBAL")
    <div class="form-group">
        <label>Ente</label>
        <select id="select" class="" name="ente_id" required="" style="width: 550px">
                <option value="" selected>Seleccione</option>
            <optgroup label="Centralizada">
                <option value="0"> Todas las dependencias</option>
           </optgroup>
           <optgroup label="Paraestatal">
           @foreach($entes as $e)
            @if($e->Tipo=='Paraestatal')
                <option value="{{$e->id}}" {{($fraccion && $e->id == $fraccion->ente_id ? "selected":"")}} > {{$e->Ente}}</option>
            @endif
           @endforeach
           </optgroup>
           <optgroup label="Municipio">
           @foreach($entes as $e)
            @if($e->Tipo=='Municipio')
                <option value="{{$e->id}}" {{($fraccion && $e->id == $fraccion->ente_id ? "selected":"")}} > {{$e->Ente}}</option>
            @endif
           @endforeach     
           </optgroup>
        </select>
    </div>
    @endif
    <p><button type="submit" class="btn btn-success btn-lg" id ="btnSave"><i class="fa fa-save"></i> Guardar</button></p>
</form>
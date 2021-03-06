
<script>
    $(function(){
        $('#puesto-form').submit(function(e){
            e.preventDefault();
            
            LoadButton($('#btnSave'));
            $.post($(this).attr('action'), $(this).serialize(), function(data){
                Ready();
                if(data) Error(data);
                OK("Guardado");
                CloseModal();
                ReloadGrid(grid, '/catalogos/puestos/data');
            }).fail(function(err){
               Ready(); 
               Error(DisplayErrors(err));
            });
        });
    DoSelect('#select');
        
    });
</script>

<form id ="puesto-form" action="{{route('catalogos.puestos.save', $puesto)}}">
    <div class="form-group">
        <label>Puesto</label>
        <input type="text" class="form-control" name="Puesto" placeholder="Nombre de puesto" value="{{$puesto ? $puesto->Puesto : ""}}" required="">
    </div>
    <div class="form-group">
        <label>Nivel</label>
        <input type="text" class="form-control" name="Nivel" placeholder="Nivel de puesto" value="{{$puesto ? $puesto->Nivel : ""}}" required="">
    </div>
    @if(auth()->user()->Tipo == "GLOBAL")
    <div class="form-group">
        <label>Ente</label>
        <select id='select' class="" name="ente_id" required="" style="width: 550px">
            <option value="" selected>Seleccione</option>
          <optgroup label="Centralizada">
                <option value="0"> Todas las dependencias</option>
           </optgroup>
           <optgroup label="Paraestatal">
           @foreach($entes as $e)
            @if($e->Tipo=='Paraestatal')
                <option value="{{$e->id}}" {{($puesto && $e->id == $puesto->ente_id ? "selected":"")}} > {{$e->Ente}}</option>
            @endif
           @endforeach
           </optgroup>
           <optgroup label="Municipio">
           @foreach($entes as $e)
            @if($e->Tipo=='Municipio')
                <option value="{{$e->id}}" {{($puesto && $e->id == $puesto->ente_id ? "selected":"")}} > {{$e->Ente}}</option>
            @endif
           @endforeach     
           </optgroup>
        </select>
    </div>
    @endif 
    <p><button type="submit" class="btn btn-success btn-lg" id ="btnSave"><i class="fa fa-save"></i> Guardar</button></p>
</form>
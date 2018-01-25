<script>
    $(function(){
        DatePicker($('.date'));        
       $('#form-user').submit(function(e){
//          alert("SUBMIT") ;
          e.preventDefault();
          LoadButton($('#btnSave'));
          console.log( $(this).attr('action'));
          $.post($(this).attr('action'), $(this).serialize(), function(data){
             // Ready();
             // ReloadGrid(grid, 'usuarios/data');
             if(data){
                 Error(data);
             } 
        //CloseModal();
             
                OK("Guardado");
//              SweetAlert("success", "Guardado");
                  
          }).fail(function(err){
              Ready();
              Error(DisplayErrors(err));
//              SweetAlert("error", DisplayErrors(error));
          });
       });

    });
    
    
</script>

<form id ="form-user" action="{{route('usuarios.save', $user)}}">
    
    <h3><?php 
        if($user && $user->rol()->count()){
            echo $user->rol->NombreRol;
        }?>
    </h3>
    
    <div class="form-group">
        <LABEL>Nombre</LABEL>
        <input type="text" name="Nombre" class="form-control" placeholder="Usuario" value="{{$user ? $user->Nombre : ""}}" required="">
    </div>
    <div class="form-group">
        <LABEL>Primer apellido</LABEL>
        <input type="text" name="Paterno" class="form-control" placeholder="Paterno" value="{{$user ? $user->Paterno : ""}}" required="">
    </div>
        <div class="form-group">
        <LABEL>Segundo apellifo</LABEL>
        <input type="text" name="Materno" class="form-control" placeholder="Materno" value="{{$user ? $user->Materno : ""}}" required="">
    </div>
 
    <div class="form-group">
        <LABEL>RFC</LABEL>
        <input type="text" name="RFC" class="form-control" placeholder="RFC" value="{{$user ? $user->RFC : ""}}" required="">
    </div>
     <div class="form-group">
        <LABEL>CURP</LABEL>
        <input type="text" name="CURP" class="form-control" placeholder="Usuario" value="{{$user ? $user->CURP : ""}}" required="">
    </div>  
    <div class="form-group">
        <LABEL>Nacionalidad</LABEL>
        <input type="text" name="Nacionalidad" class="form-control" placeholder="Usuario" value="{{$user ? $user->Nacionalidad : ""}}" required="">
    </div>  
    <div class="form-group">
        <LABEL>Fecha de nacimiento</LABEL>
        <input type="text" name="Nacimiento" class="form-control date" style="width:140px" placeholder="Fecha" value="{{$user ? $user->Nacimiento : ""}}" required="">
    </div>    
    <div class="form-group">
        <LABEL>Lugar de nacimiento</LABEL>
        <input type="text" name="Lugar_nacimiento" class="form-control" placeholder="Lugar de nacimiento" value="{{$user ? $user->Lugar_nacimiento : ""}}" required="">
    </div>    
    <div class="form-group">
        <LABEL>Correo</LABEL>
        <input type="email" name="Correo" class="form-control" placeholder="Correo" value="{{$user ? $user->Correo : ""}}" required="">
    </div>
    <div class="form-group">
        <LABEL>Correo alterno</LABEL>
        <input type="email" name="Correo_alterno" class="form-control" placeholder="Correo_alterno" value="{{$user ? $user->Correo_alterno : ""}}" >
    </div>    
    
    <div class="form-group">
        <LABEL>Rol</LABEL>
        <select class="form-control" name="rol_id" required="">
            <option value="">Seleccione</option>
            @foreach($roles as $r)
            <option value="{{$r->id}}" {{($user && $r->id == $user->rol_id ? "selected":"")}} > {{$r->NombreRol}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <LABEL>Password</LABEL>
        <input type="password" name="Password" class="form-control" placeholder="Password"  required="">
    </div>
    
    <div class="form-group">
        <LABEL>Confirmar</LABEL>
        <input type="password" name="Password_confirmation" class="form-control" placeholder="Confirmar" required="">
    </div>
    
    <p> 
        <button class="btn btn-success btn-lg" type="submit" id ="btnSave"><i class="fa fa-save"></i> Guardar</button>
        
    </p>
    
</form>
<script>
    $(function(){
        DatePicker($('.date'));        
       $('#form-user').submit(function(e){
//          alert("SUBMIT") ;
          e.preventDefault();
          LoadButton($('#btnSave'));
          $.post($(this).attr('action'), $(this).serialize(), function(data){
              Ready();
              ReloadGrid(grid, 'usuarios/data');
              CloseModal();
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
        <LABEL>Segundo apellido</LABEL>
        <input type="text" name="Materno" class="form-control" placeholder="Materno" value="{{$user ? $user->Materno : ""}}" >
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
        <LABEL>Fecha de nacimiento
            
        </LABEL>
        <input type="text" name="Nacimiento" class="form-control date" style="width:140px" placeholder="Fecha" value="{{ $user ?Carbon\Carbon::parse( $user->Nacimiento)->format('d/m/Y'):"" }}" required="">
    </div>    
    <div class="form-group">
        <LABEL>Lugar de nacimiento</LABEL>
        <input type="text" name="Lugar_nacimiento" class="form-control" placeholder="Lugar de nacimiento" value="{{$user ? $user->Lugar_nacimiento : ""}}" >
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
            <option value="{{$r->id}}" {{($user && $r->id == $user->rol_id ? "selected":"")}} > {{$r->Rol}}</option>
            @endforeach
        </select>
    </div>
    
   <?php /* <span  class="   btn btn-danger btn-lg" id="chg2"  style="display:none" onclick="$('#pwd').hide();$('#pwd2').hide();$('#chg1').show();$('#chg2').hide(); $( '#chg1' ).prop( 'disabled', true ); $( '#chg2' ).prop( 'disabled', true ); " >Cancelar cambiar password</span>
    
    */   ?>
   <?php if($data['Vista']==0){ ?> 

    <div class="form-group" id="pwd" style="display:{{$user?"none":""}}">
        <LABEL>Password</LABEL>
        <input type="password" name="Password" id='Password' class="form-control" {{$user?'disabled="disabled"':''}} placeholder="Password" required="">
    </div>
    
    <div class="form-group" id="pwd2" style="display:{{$user?"none":""}}">
        <LABEL>Confirmar</LABEL>
        <input type="password" name="Password_confirmation" id="Password_confirmation" class="form-control" {{$user?'disabled="disabled"':''}} placeholder="Confirmar" required="">
    </div>
    
    <p>
        
        <span class=" btn btn-info btn-lg" id="chg1"  style="display:{{$user?"":"none"}}"  onclick="$('#pwd').show();$('#pwd2').show();$('#chg2').show();$('#chg1').hide();$( '#Password_confirmation' ).prop( 'disabled', false ); $( '#Password' ).prop( 'disabled', false ); " >Cambiar password</span>
      
        <button class="btn btn-success btn-lg" type="submit" id ="btnSave"><i class="fa fa-save"></i> Guardar</button>
        
    </p>
    <?php }?> 
    
</form>
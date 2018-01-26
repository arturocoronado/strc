<script>
    $(function(){
        $('#password').submit(function(e){
            e.preventDefault();
            LoadButton($(this).find('button'));
            $.post($(this).attr('action'), $(this).serialize(), function(data){
//                if(data) Error(data);
                Ready();
                OK("Guardado");
                CloseModal();
            }).fail(function(err){
                Ready();
                Error(DisplayErrors(err));
            });
        });
    });
</script>

<form id ="password" action ="/micuenta/password/save">
    <div class="form-group">
        <label>Password actual</label>
        <input type="password" class="form-control" name="actual" placeholder="Su contraseña actual" required="">
    </div>
    <div class="form-group">
        <label>Nuevo password</label>
        <input type="password" class="form-control" name="Password" placeholder="Su nueva contraseña" required="">
    </div>
    <div class="form-group">
        <label>Password actual</label>
        <input type="password" class="form-control" name="Password_confirmation" placeholder="Confirme su contraseña" required="">
    </div>
    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-lock"></i> Cambiar</button>
</form>
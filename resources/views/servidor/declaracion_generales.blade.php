<script>
    
</script>

<form id ="generales" action ="/declaracion/generales">
    
    <h3>Datos generales del servidor</h3><hr> 
    
    <table class="table table-striped">
        <tr>
            <td><label>Nombre(s)</label></td>
            <td>{{$user->Nombre}}</td>
            <td><label>Primer Apellido</label></td>
            <td>{{$user->Paterno}}</td>
            <td><label>Segundo Apellido</label></td>
            <td>{{$user->Materno}}</td>
            <td><label>RFC</label></td>
            <td>{{$user->RFC}}</td>
            <td><label>Correo</label></td>
            <td>{{$user->Correo}}</td>
        </tr>
        <tr>
            <td><label>Adscripción</label></td>
            <td>{{$laboral->ente->Ente}}</td>
            <td><label>Puesto</label></td>
            <td>{{$laboral->puesto->Puesto}}</td>
            <td><label>Contratación</label></td>
            <td>{{$laboral->contratacion->Tipo}}</td>
            <td><label>Área</label></td>
            <td>{{$laboral->Area}}</td>
            <td><label>Desde</label></td>
            <td>{{$laboral->Inicio->format('d/m/Y')}}</td>
        </tr>
        <tr>
            <td><label>Funciones</label></td>
            <td colspan="9">
                {{ $laboral->funciones->implode('Funcion', '; ') }}
            </td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td>
                {{}}
            </td>
        </tr>
    </table>
    
</form>
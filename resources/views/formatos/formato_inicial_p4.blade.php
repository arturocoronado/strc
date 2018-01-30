
<div class="pagina">
    <div style="display: block;width: 500px;height: 50px;"></div>
    <div class="" style="margin: auto;position: absolute;left:0;right: 0;display: block;width: 500px;height: 100px">
        <h4>DATOS CURRICULARES DEL DECLARANTE</h4>

    </div>
    @forelse ($escolares as $e)
    <div style="display: block;width: 500px;height: 5px;"></div>

    <div class="" style="border: 1px solid #000;
         border-radius: 5px;display: block;padding: 5px;margin: auto; position: absolute;left:0;right: 0;width: 650px;height: 100px;">
        <!--<div class="row" style="padding: 5px;">-->
        <table class="table table-bordered">
            <tr>
                <th colspan="3">{{$e->Carrera}}</th>
            </tr>
            <tr>
                <th>Nivel</th>
                <th>Estatus</th>
                <th>Documento obtenido</th>
            </tr>
            <tr>
                <td>{{$e->Nivel}}</td>
                <td>{{$e->Estatus}}</td>
                <td>{{$e->Documento}}</td>
            </tr>
            <tr>
                <th>Periodicidad</th>
                <th>Institucion</th>
                <th>Ciudad</th>
            </tr>
            <tr>
                <td>{{$e->Periodicidad}}</td>
                <td>{{$e->Institucion}}</td>
                <td>{{$e->Ciudad}}</td>
            </tr>
            <tr>
                <th>Origen (nacional o extranjero) </th>
                <th>Niveles&nbsp;Cursados</th>
                <th>Cédula</th>
            </tr>
            <tr>
                <td>{{$e->Nacional}}</td>
                <td>{{$e->Cursados}}</td>
                <td>{{$e->Cedula}}</td>
            </tr>
        </table>
        <!--</div>-->
    </div>

    @empty
    <div style="display: block;width: 500px;height: 5px;"></div>

    <div class="" style="border: 1px solid #000;
         border-radius: 5px;display: block;padding: 5px;margin: auto; position: absolute;left:0;right: 0;width: 650px;height: 100px;">
        <p>Sin escolaridad agregada</p>
    </div>

    @endforelse



</div>

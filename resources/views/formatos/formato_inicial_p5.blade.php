
<div class="pagina">
    <div style="display: block;width: 500px;height: 50px;"></div>
    <div class="" style="margin: auto;position: absolute;left:0;right: 0;display: block;width: 500px;height: 100px">
        <h4>EXPERIENCIA LABORAL DEL DECLARANTE</h4>

    </div>
    @forelse ($laborales as $e)
    <div style="display: block;width: 500px;height: 5px;"></div>

    <div class="" style="border: 1px solid #000;
         border-radius: 5px;display: block;padding: 5px;margin: auto; position: absolute;left:0;right: 0;width: 650px;height: 100px;">
        <!--<div class="row" style="padding: 5px;">-->
        <table class="table table-bordered">
            <tr>
                <th>Puesto</th>
                <th>Cargo</th>
                <th>Contratación</th>
                <th>Nivel</th>
            </tr>
            <tr>
                <td>{{$e->Puesto}}</td>
                <td>{{$e->Cargo}}</td>
                <td>{{$e->Contratacion}}</td>
                <td>{{$e->Nivel}}</td>
            </tr>
            <tr>
                <th>Salario</th>
                <th>Área</th>
                <th>Teléfono</th>
                <th>Extensión</th>
            </tr>
            <tr>
                <td>{{$e->Salario}}</td>
                <td>{{$e->Area}}</td>
                <td>{{$e->Telefono}}</td>
                <td>{{$e->Extension}}</td>
            </tr>
            <tr>
                <th colspan="4" style="text-align: center">DOMICILIO</th>
            </tr>
            <tr>
                <th>Calle</th>
                <th>Número exterior e interior</th>
                <th>Colonia</th>
                <th>Ciudad</th>
            </tr>
            <tr>
                <td>{{$e->Calle_trabajo}}</td>
                <td>{{$e->Numero_trabajo}}</td>
                <td>{{$e->Colonia_trabajo}}</td>
                <td>{{$e->Ciudad}}</td>
            </tr>
            <tr>
                <th>ART64</th>
                <th>AG172</th>
                <th>Inicio</th>
                <th>Termino</th>
            </tr>
            <tr>
                <td>{{$e->ART64}}</td>
                <td>{{$e->AG172}}</td>
                <td>{{$e->Inicio}}</td>
                <td>{{$e->Termino}}</td>
            </tr>
        </table>
        <!--</div>-->
    </div>

    @empty
    <div style="display: block;width: 500px;height: 5px;"></div>

    <div class="" style="border: 1px solid #000;
         border-radius: 5px;display: block;padding: 5px;margin: auto; position: absolute;left:0;right: 0;width: 650px;height: 100px;">
        <p>Sin datos laborales agregados</p>
    </div>

    @endforelse



</div>

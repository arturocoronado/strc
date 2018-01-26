
@extends('base')

@section('title', 'Datos de mi cuenta')

@section('style')

<style type="text/css">
    .btn-change {width: 90%; margin: 5px auto;}
</style>

@endsection

@section('script')

<script>
    $(function(){
       $('.btn-change').click(function(){
           Loading();
           var self = $(this);
           $.get('/micuenta/change/' + $(this).attr('id'), function(data){
              Ready();
              if(data) Error(data);
              var btns = $('.btn-change.btn-success');
              console.log(btns);
              $(btns).addClass('btn-danger').removeClass('btn-success').html('<i class="fa fa-exchange"></i> Seleccionar este puesto').removeAttr('disabled');
              $(self).removeClass('btn-danger').addClass('btn-success').html('<i class="fa fa-check-square"></i> Puesto seleccionado</button>').attr('disabled', 'true');
           }).fail(function(err){
                Ready();
                Error(DisplayErrors(err));
            });
       });
    });
</script>

@endsection 

@section('content')

<div class="jumbotron">
    <h3>A continuación se muestran sus datos principales en cada una de las entidades donde se encuentra registrado</h3><hr>
    <p>En esta sección puede cambiar entre una u otra cuenta para revisar su historlal y continuar con su proceso de declaración según correspnde</p>
    <p><i>Si considera que existe un error en su registro, favor de contactar a su área de personal</i></p>
</div>

<div class="alert alert-success">
    <h3>Datos personales</h3><hr>
    <table class="table table-striped">
        <tr>
            <td><label>Nombre</label></td>
            <td>{{$personales->Nombre}} {{$personales->Paterno}} {{$personales->Materno}}</td>
            <td><label>RFC</label></td>
            <tD>{{$personales->RFC}}</tD>
            <td><label>Correo oficial</label></td>
            <tD>{{$personales->Correo}}</tD>
        </tr>
    </table>
</div>


<h3><span class="label label-primary">Datos laborales</span></h3><hr>
@if($laborales->count() > 1) 
<p>Seleccione la entidad donde quiere revisar o realizar su declaración</p><br>
@endif 

@foreach($laborales as $l)
<div class="alert alert-info" id ="panel-lab">
    <table class="table">
        <tr>
            <td width="100"><label>Dependencia/Entidad</label></td>
            <td width="400">{{$l->ente->Ente}}</td>
            <td width="100"><label>Puesto</label></td>
            <td width="200">{{$l->puesto->Puesto}}</td>
            <td width="50"><label>Contratación</label></td>
            <td>{{$l->Contratacion}}</td>
            <td width="50"><label>Nivel</label></td>
            <td>{{$l->Nivel}}</td>
        </tr>
        <tr>
            <td colspan="8">
                @if($l->id == session('DEC_POSITION'))
                <center><button class="btn btn-success btn-change" id ="{{$l->id}}" disabled=""><i class="fa fa-check-square"></i> Puesto seleccionado</button></center>
                @else 
                <center><button class="btn btn-danger btn-change" id ="{{$l->id}}"><i class="fa fa-exchange"></i> Seleccionar este puesto</button></center>
                @endif
            </td>
        </tr>
    </table>
</div>
@endforeach

@endsection
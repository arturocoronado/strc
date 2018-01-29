
@extends('base')

@section('title', 'Declaración patrimonial')

@section('style')

<style type="text/css">
    
</style>

@endsection

@section('script')

<script>
    $(function(){
        $('#smartwizard').smartWizard({ 
            selected: 0, 
            theme: 'arrows',
            transitionEffect:'fade',
            showStepURLhash: true,
            lang: { 
                next: 'Siguiente',
                previous: 'Anterior'
            },
            toolbarSettings: {toolbarPosition: 'top',
//                                  toolbarExtraButtons: [btnFinish, btnCancel]
                                }
        });
    });
</script>

@endsection 

@section('content')

<div id="smartwizard">
        <ul>
            <li><a href="#step-1" data-content-url="/declaracion/generales">Generales</a></li>
            <li><a href="#step-2" data-content-url="/declaracion/personal">Personal</a></li>
            <li><a href="#step-3" data-content-url="/declaracion/curricular">Curricular</a></li>
            <li><a href="#step-4" data-content-url="/declaracion/dependientes">Dependientes</a></li>
            <li><a href="#step-5" data-content-url="/declaracion/inmuebles">Inmuebles</a></li>
            <li><a href="#step-6" data-content-url="/declaracion/vehiculos">Vehículos</a></li>
            <li><a href="#step-7" data-content-url="/declaracion/muebles">Muebles</a></li>
            <li><a href="#step-8" data-content-url="/declaracion/inversiones">Inversiones</a></li>
            <li><a href="#step-9" data-content-url="/declaracion/adeudos">Adeudos</a></li>
            <li><a href="#step-10" data-content-url="/declaracion/intereses">Intereses</a></li>
            
        </ul>
        <div>
            <div id="step-1" class="">
                
            </div>
            <div id="step-2" class="">
                <h2>1</h2>
            </div>
            <div id="step-3" class="">
                <h2>2</h2>
            </div>  
            <div id="step-4" class="">
                <h2>3</h2>
            </div>
            <div id="step-5" class="">
                <h2>4</h2>
            </div>
            <div id="step-6" class="">
                <h2>4</h2>
            </div>
            <div id="step-7" class="">
                <h2>4</h2>
            </div>
            <div id="step-8" class="">
                <h2>4</h2>
            </div>
            <div id="step-9" class="">
                <h2>4</h2>
            </div>
            <div id="step-10" class="">
                <h2>4</h2>
            </div>
        </div>
</div>

@endsection
<header id="header" class="box-header sticky">
    <div class="container">
            <div class="row box-header-wrap">
                <!-- Start logo -->
                <div class="col-sm-2 col-xs-4">
                    <div id="logo" class="logos">
                        <a href="{{url('/')}}" class="standard-logo pull-left">
                            <img class="logo" src="{{asset('css/img/logo.png')}}" width ="70" height="60" alt="logo">
                        </a>
                    </div>
                </div> <!-- //.col-sm-2 
                <!-- End logo -->
                
                    <!-- Start desktop nav -->
                <div class="col-sm-10 col-xs-8">
                        <nav class="main-nav pull-right">
                            <ul>
                                @if(auth()->user()->admin_id)
                                <li class="has-child ">
                                    <a href="#">Declaración</a>
                                    <div class="dropdown left-indent">
                                        <ul class="dropdown-items">
                                            <li>
                                                <a href="{{url('/micuenta')}}">Mi cuenta</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/declaracion')}}">Declarar</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/historial')}}">Historial</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/prorroga')}}">Prórroga</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-child ">
                                    <a href="#">Catálogos</a>
                                    <div class="dropdown left-indent">
                                        <ul class="dropdown-items">
                                            <li>
                                                <a href="{{url('/catalogos/entes')}}">Entes</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/catalogos/puestos')}}">Puestos</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/catalogos/fracciones')}}">Fracciones</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/catalogos/contrataciones')}}">Contrataciones</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-child ">
                                    <a href="#">Padrón</a>
                                    <div class="dropdown left-indent">
                                        <ul class="dropdown-items">
                                            <li>
                                                <a href="{{url('/padron/alta')}}">Altas</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/padron/movimientos')}}">Movimientos</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/padron/recordatorios')}}">Recordatorios</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/padron/prorrogas')}}">Prórrogas</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-child ">
                                    <a href="#">Verificación</a>
                                    <div class="dropdown left-indent">
                                        <ul class="dropdown-items">
                                            <li>
                                                <a href="{{url('/verificacion/buscar')}}">Buscador</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/verificacion/lista')}}">Listado</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/verificacion/procedimientos')}}">Procedimientos</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/verificacion/consulta')}}">Declaraciones</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-child ">
                                    <a href="#">Usuarios</a>
                                    <div class="dropdown left-indent">
                                        <ul class="dropdown-items">
                                            <li>
                                                <a href="{{url('/usuarios')}}">Usuarios</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/roles')}}">Roles y permisos</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-child ">
                                    <a href="#">Opciones</a>
                                    <div class="dropdown left-indent">
                                        <ul class="dropdown-items">
                                            <li>
                                                <a href="{{url('/config/opciones')}}">Configuración</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/config/calendario')}}">Calendario</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-child ">
                                    <a href="#">Reportes</a>
                                    <div class="dropdown left-indent">
                                        <ul class="dropdown-items">
                                            <li>
                                                <a href="{{url('/reportes/declaracion')}}">Declaraciones</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/reportes/cumplimiento')}}">Cumplimiento</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/reportes/padron')}}">Padrón</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/reportes/omisos')}}">Omisos</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
<!--                                <li class="has-child ">
                                    <a href="#">Sistema</a>
                                    <div class="dropdown left-indent">
                                        <ul class="dropdown-items">
                                            <li>
                                                <a href="{{url('/sistema/cuenta')}}">Mi cuenta</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/login/out')}}">Salir</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>-->
                                @else
                                <li>
                                    <a href="{{url('/micuenta')}}">Mi cuenta</a>
                                </li>
                                <li>
                                    <a href="{{url('/declaracion')}}">Declaración</a>
                                </li>
                                <li>
                                    <a href="{{url('/historial')}}">Historial</a>
                                </li>
                                <li>
                                    <a href="{{url('/prorroga')}}">Prórroga</a>
                                </li>
                                @endif 
                                <li>
                                    <a href="{{url('/login/out')}}">Salir</a>
                                </li>
                            </ul>
                        </nav>

                        <!-- toogle icons, which are responsible for display and hide menu in small layout -->
                        <div class="offcanvas-toggler pull-right">
                                <i id="offcanvas-opener" class="icon-menu"></i>
                                <i id="offcanvas-closer" class="icon-times"></i>
                        </div>
                </div> <!-- //.col-sm-10 -->
                    <!-- End desktop nav -->
            </div> <!-- //.row -->
     </div> <!-- //.container -->
</header>
<!-- //End Header -->
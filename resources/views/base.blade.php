<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ Session::token() }}"> 
        
        <title>Declaranet PLUS Guanajuato</title>
        <link rel="shortcut icon" href="img/favicon.ico" >
        <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        
        
        @if(auth()->check())
        
        
        <link type="text/css" rel="stylesheet" href="{{asset('css/menu/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/menu/style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/menu/presets/preset-gradient.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome-4.7.0/css/font-awesome.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/select2/select2.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/multiselect/css/multi-select.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('js/dhtmlx/dhtmlx.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('js/dataTables/css/jquery.dataTables.min.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('js/sweetalert/dist/sweetalert.css')}}">
        
        @else  
        
        <link type="text/css" rel="stylesheet" href="{{asset('css/login.css')}}">
        
        @endif 
        
        <style type="text/css">
            body, html {
                height: 100%;
                background-repeat: no-repeat;
                background-image: linear-gradient(#27ACDD, #84BA55);
            }
            #main-content {margin-top: 100px;}
            .RowCount {padding:  10px; }
            .fa {cursor: pointer;}
            .fa-trash-o {color: red;}
            .fa-question-circle {color: #4988ED;}
            .fa-times-circle-o {color: #F21D1D;}
            .fa-pencil {color: #74C5F7;}
            .fa-edit {color: #4988ED;}
            .fa-power-off {color: red;}
            .fa-archive {color: #84847F;}
            .fa-user {color: #80D3F7;}
            .fa-times {color: #C90808; }
            .fa-download {color: #218DED; }
        </style>
        
        @yield('style')
        
        
        <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dhtmlx/dhtmlx.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTables/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/select2.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.multi-select.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/sweetalert/dist/sweetalert2.all.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/fn.js')}}"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')}
                });
                
                $('.main-nav').find('a[href="/{{Request::path()}}"]').parents('li.has-child').addClass('active');
            });
        </script>
        
        @yield('script')
        
    </head>
    <body>
            @if(auth()->check())
            
            @include('menu')
            
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h3 class="modal-title" ><span class="label label-info" id="myModalLabel">Modal title</span></h3>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container" id ="main-content">
                
                <h2 class="text-center"><span class="label label-success"> @yield('title', 'Inicio') </span></h2><hr>
                @yield ('content')
            </div>
            
            @else 
            
           <div class="container">
            <div class="card card-container">
                <center><img src="{{asset('css/img/logo.png')}}" alt=""/> </center> <hr>
                <h3 class="text-center">Declaranet PLUS</h3><br>
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" action="{{route('login.enter')}}" method="post">
                    {{csrf_field()}}
                    
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="text" id="inputEmail" class="form-control" name ="rfc" placeholder="RFC con homoclave" required autofocus>
                    <input type="password" id="inputPassword" class="form-control" name ="pwd" placeholder="Contraseña" required>
                    
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
                </form><!-- /form -->
                <a href="#" class="forgot-password">
                    ¿Olvido su contraseña?
                </a>
                @include('errors')
            </div><!-- /card-container -->
            
           </div><!-- /container -->
           
           
           @endif 
            
        
    </body>
</html>

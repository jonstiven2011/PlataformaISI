<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- iconos Fonts awesome-->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Nuevo stylo creado-->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{ asset('imgs/ISI/logoIsi2.png')}}" width="70">
                </a>
                <h2 style="font-family: 'Times New Roman', Times, serif">EMPRESA DE EDUCACIÓN I.S.I  S.A.S</h2><br>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- Nav superior HOME , el @auth es para que solo sirva cuando este logueado--}}
                        @auth  
                            <li><a class="nav-item nav-link" href="{{url('home')}}" style="font-family: 'Times New Roman', Times, serif; font-size:20px">
                                <i class="fa fa-home"></i>
                                    Inicio</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link bg-secondary"  href="{{ route('login') }}"><i class="fa fa-lock">&nbsp;&nbsp;</i>{{ __('Iniciar Sesión') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link bg-secondary" href="{{ route('register') }}"><i class="fa fa-info">&nbsp;&nbsp;</i>{{ __('Mas Información') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{asset(Auth::user()->photo)}}" class="rounded-circle" width="50px">
                                    {{ Auth::user()->fullname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- Condicion para roles --}}
                                    
                                    @if (Auth::user()->role == 'admin') 
                                        {{-- Boton De Users --}}
                                        <a href="{{url('users')}}" class="dropdown-item">
                                            <i class="fa fa-users"></i>
                                            Mis Usuarios
                                        </a>
                                        {{-- Boton De Categorias --}}
                                        <a href="{{url('categories')}}" class="dropdown-item">
                                            <i class="fa fa-list"></i>
                                            Mis Cursos
                                        </a>
                                        {{-- Boton De Articulos --}}
                                        <a href="{{url('articles')}}" class="dropdown-item">
                                            <i class="fa fa-newspaper"></i>
                                            Mis Clases
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>
                                            Cerrar Sesión
                                        </a>
                                    @endif
                                    
                                    @if (Auth::user()->role == 'editor') 
                                        {{-- Divide los item --}}
                                        <div class="dropdown-divider"></div>
                                        {{--  --}}
                                        <a href="{{ url('mydata') }}" class="dropdown-item">
                                            <i class="fa fa-user"></i>
                                            Mis Cursos
                                        </a>
                                        <a href="{{ url('myarticles') }}" class="dropdown-item">
                                            <i class="fa fa-newspaper"></i>
                                            Mis Clases
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>
                                            Cerrar Sesión
                                        </a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- incluir el jquery NECESARIO --}}
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

    {{-- CDN para alert de laravel --}}
    <script src="{{ asset('js/sweetalert2@9.js') }}"></script>

    <script>
        
        $(document).ready(function(){
        $('.btn-delete').click(function(event) {
            Swal.fire({
                title: 'Esta usted Seguro?',
                text: "Desea Eliminar este registro!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#38c172',
                cancelButtonColor: '#e3342f',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                $(this).parent().submit();
                }
            })
        });
        // *****************Mensaje****************
        @if (session('message'))
            Swal.fire(
                'Felicitaciones',
                '{{ session('message') }}',
                'success'
            );
        @endif
        // /*********************Mensage Error**************
        @if (session('error'))
            Swal.fire(
                'Problemas de Acceso',
                '{{ session('error') }}',
                'error'
            );
        @endif
        
        //Carga la foto de usuarios
        $('.btn-upload').click(function(event){
                $('#photo').click();
        });
        //*******************Codigo para seleccionar una foto y que aparezca en pantalla
        $('#photo').change(function(e){
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src',e.target.result);
                // document.getElementById("preview").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        //-----------------------------------
        //Carga la foto de categorias
        $('.btn-upload').click(function(event){
                $('#image').click();
        });
        //*******************Codigo para seleccionar una foto y que aparezca en pantalla
        $('#image').change(function(e){
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src',e.target.result);
                // document.getElementById("preview").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        //***************PDF INSTRUCCIONES*********************
        $('#instrucciones').change(function(e){
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src',e.target.result);
                // document.getElementById("preview").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        //Carga la presentacion de clase
        $('.btn-uploadpdf').click(function(event){
                $('#instrucciones').click();
        });
        //*******************Codigo para seleccionar un video y que aparezca en pantalla
        $('#video').change(function(e){
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previeww').attr('src',e.target.result);
                // document.getElementById("preview").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        //Carga el video de cursos
        $('.btn-uploadd').click(function(event){
                $('#video').click();
        });
        //*******************Codigo para seleccionar una presentacion y que aparezca en pantalla
        $('#present').change(function(e){
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src',e.target.result);
                // document.getElementById("preview").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        //Carga la presentacion de clase
        $('.btn-uploadpresent').click(function(event){
                $('#present').click();
        });
        //*******************Codigo para seleccionar una presentacion 2 y que aparezca en pantalla
        $('#present_2').change(function(e){
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src',e.target.result);
                // document.getElementById("preview").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        //Carga la presentacion 2 de clase
        $('.btn-uploadpresent_2').click(function(event){
                $('#present_2').click();
        });
        //----------------carga las categorias por medio de un select en el inicio-------------------
        $('body').on('change', '#catid', function(event) {
                event.preventDefault();
                $cid = $(this).val();
                $tk  = $('input[name=_token]').val();
                $.post('loadcat', {cid: $cid, _token: $tk}, function(data) {
                    $("#content").hide();
                    $(".loader").removeClass('d-none');
                    setTimeout(function() {
                        $(".loader").addClass('d-none');
                        $("#content").fadeIn(1200).html(data);
                    },1200);
                });
            });
        
    });
    </script>
</body>
</html>

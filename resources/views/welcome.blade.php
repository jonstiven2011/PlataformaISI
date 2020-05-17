@extends('layouts.app')
    <link href="{{asset('css/galleryArticles.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

@section('title','BIENVENIDO')

@section('content')

{{--BIENVENIDOS  --}}
<div align="center">
    <h1 style="font-family: 'Times New Roman', Times, serif">Nuestra Sede vela por la capacidad de brindar el mejor conocimiento a sus estudiantes.</h1>
</div>
<br><br>
{{-- Tarjetas de Facultades --}}
<div class="container">
    <div class="row justify-content-center">
        {{-- Inicio de tarjeta --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <img src="{{ asset('imgs/ISI/icons/salud.png') }}" class="card-img-top" height="240px">
                    <div class="card-body">
                        <a href="#" class="btn btn-indigo btn-block">Area de la Salud</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Inicio de tarjeta --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <img src="{{ asset('imgs/ISI/icons/investigacion.png') }}" class="card-img-top" height="240px">
                    <div class="card-body">
                        <a href="{{ url('login') }}" class="btn btn-indigo btn-block">Area de Investigación</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Inicio de tarjeta --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <img src="{{ asset('imgs/ISI/icons/idioma.png') }}" class="card-img-top" height="240px">
                    <div class="card-body">
                        <a href="#" class="btn btn-indigo btn-block">Idiomas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

{{-- Fin de tarjetas --}}

{{-- Carrusel --}}
{{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" align="center">
        <div class="carousel-item active" >
            <img class="d-block w-500" src="{{ asset('imgs/ISI/isiriosucio.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-500" src="{{ asset('imgs/ISI/crimi.jpeg') }}" alt="Second slide">
        </div>
    </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Atrás</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
</div> --}}
{{-- Footer --}}
<footer id="sticky-footer" class="py-4 bg-primary text-dark-50">
    <div class="container text-center" style="font-size: 20px">
      <small >Copyright &copy; EMPRESA DE EDUCACIÓN I.S.I  S.A.S</small><br>
      <small >NIT 9011325814-2</small><br>
      <small >N° de Contacto: 3219815308</small>
    </div>
</footer>
@endsection


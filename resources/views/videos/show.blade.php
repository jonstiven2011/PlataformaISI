@extends('layouts.app')

<title>Ver Video @yield('title')</title>

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--}}
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-search"></i>
                Visualizar Video
            </h1>
            <hr>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('videos') }}">Lista de Videos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visualizar Video</li>
                </ol>
            </nav>
            {{-- Tabla --}}
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th>Nombre de la Clase:</th>
                    <td>{{ $movie->nameclase}}</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <video class="video-fluid" controls width="300px" height="200px">
                            <source src="{{asset($movie->video)}}" type="video/mp4">
                        </video>
                    </td>
                </tr>
                
            </table>
        
        </div>
    </div>
</div>
@endsection

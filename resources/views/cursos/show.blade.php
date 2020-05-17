@extends('layouts.app')

<title>Mi Curso @yield('title')</title>

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--}}
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-search"></i>
                Consultar Curso
            </h1>
            <hr>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('categories') }}">Lista de Cursos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consultar Curso</li>
                </ol>
            </nav>
            {{-- Tabla --}}
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="2" class="text-center">
                    <img class="img-thumbnail" src="{{ asset($curso->image) }}" width="500px">
                    </td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $curso->name}}</td>
                </tr>
                <tr>
                    <th>Descripción:</th>
                    <td>{{ $curso->description}}</td>
                </tr>
            </table>
        
        </div>
    </div>
</div>
@endsection

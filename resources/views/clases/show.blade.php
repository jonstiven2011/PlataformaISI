@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--**********************MUESTRA UN SOLO DATO******************}} 
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-search"></i>
                Consultar Articulos
            </h1>
            <hr>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('Clases') }}">Lista de Clases</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consultar Clase</li>
                </ol>
            </nav>
            {{-- Tabla --}}
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="2" class="text-center">
                    <img class="img-thumbnail" src="{{ asset($clase->image) }}" width="200px">
                    </td>
                </tr>
                <tr>
                    <th>Nombre Clase:</th>
                    <td>{{ $clase->name}}</td>
                </tr>
                <tr>
                    <th>Descripcion:</th>
                    <td>{{ $clase->description}}</td>
                </tr>
                <tr>
                    <th>Usuario:</th>
                    <td>{{ $user->fullname}}</td>
                </tr>
                <tr>
                    <th>Curso:</th>
                    <td>{{ $category->name}}</td>
                </tr>
            </table>
        
        </div>
    </div>
</div>
@endsection

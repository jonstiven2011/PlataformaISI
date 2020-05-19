@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--**********************MUESTRA UN SOLO DATO******************}} 

            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('clases') }}">Lista de Clases</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consultar Clase</li>
                </ol>
            </nav>
            
            {{-- Tabla --}}
            <table class="table table-striped table-bordered table-hover">
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
                    <td>{{ $curso->name}}</td>
                </tr>
                <tr>
                    <th>Instrucciones:</th>
                    <td>{{ $clase->instrucciones}}</td>
                </tr>
                <tr>
                    <th>Presentaciín 1:</th>
                    <td>{{ $clase->present}}</td>
                </tr>
                <tr>
                    <th>Presentación 2:</th>
                    <td>{{ $clase->present_2}}</td>
                </tr>
                <tr>
                    <th>Presentación en Drive:</th>
                    <td>{{ $clase->pdrive}}</td>
                </tr>
                <tr>
                    <th>Presentación en Drive 2:</th>
                    <td>{{ $clase->pdrive_2}}</td>
                </tr>
                <tr>
                    <th>Formulario:</th>
                    <td>{{ $clase->formulario}}</td>
                </tr>
                <tr>
                    <th>Formulario 2:</th>
                    <td>{{ $clase->formulario_2}}</td>
                </tr>
            </table>
        
        </div>
    </div>
</div>
@endsection

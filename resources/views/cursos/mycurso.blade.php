@extends('layouts.app')

<title>Mis Cursos @yield('title')</title>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- Navar  --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('clases') }}">Mis Clases</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mis Cursos</li>
                </ol>
            </nav>
            
         {{-- Tabla --}}
            <table class="table table-inverse table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre Curso</th>
                        <th>Descripción</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{$curso->name}}</td>
                            <td>{{$curso->description}}</td>
                            <td><img src="{{asset($curso->image)}}" width="40px"></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            {{-- Para paginar --}}
                            {{$cursos->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>
@endsection

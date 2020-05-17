@extends('layouts.app')

<title>Mis Clases @yield('title')</title>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('mycurso') }}">Mis Cursos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consultar Articulo</li>
                </ol>
            </nav>

         {{-- Tabla --}}
            <table class="table table-inverse table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Clase</th>
                        <th>Descripción</th>
                        <th>Instrucciones</th>
                        <th>Video</th>
                        <th>Presentaciones</th>
                        <th>Prezi</th>
                        <th>Formularios</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clases as $clase)
                        <tr>
                            <td>{{$clase->name}}</td>
                            <td>{{$clase->description}}</td>
                            <td>
                                <a href="{{$clase->instrucciones}}" class="btn btn-indigo btn-sm" width="40px"> 
                                    <i class="fa fa-file-pdf"> Visualizar</i> 
                                </a>
                            </td>
                            <td>
                                <a href="{{$clase->video}}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-file-video"> Ver</i> 
                                </a>
                            </td>
                            <td>
                                <a href="{{$clase->presentacion}}" class="btn btn-indigo btn-sm"> 
                                    1-<i class="fa fa-file-powerpoint"></i> 
                                </a>
                                <a href="{{$clase->presentacion_2}}" class="btn btn-indigo btn-sm"> 
                                    2-<i class="fa fa-file-powerpoint"></i> 
                                </a>
                            </td>
                            <td></td>
                            <td>
                                <a href="{{$clase->formulario}}" class="btn btn-indigo btn-sm"> 
                                   1- <i class="fab fa-google-drive"></i> 
                                </a>
                                <a href="{{$clase->formulario_2}}" class="btn btn-indigo btn-sm"> 
                                    2- <i class="fab fa-google-drive"></i> 
                                 </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            {{-- Para paginar --}}
                            {{$clases->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>
@endsection

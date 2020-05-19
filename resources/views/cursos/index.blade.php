@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        {{-- Boton adicionar usuario --}}
        {{-- Color Azul Oscuro #01458E --}}
            <a href="{{url('cursos/create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Adicionar Curso
            </a>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('videos') }}">Lista de Videos</a></li>
                <li class="breadcrumb-item"><a href="{{ url('clases') }}">Lista de Clases</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Cursos</li>
                </ol>
            </nav>
         {{-- Tabla --}}
            <table class="table table-inverse table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Nombre Curso</th>
                        <th>Descripción</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{$curso->name}}</td>
                            <td>{{$curso->description}}</td>
                            <td><img src="{{asset($curso->image)}}" width="250px"></td>
                            <td>
                                {{-- Boton de buscar --}}
                                <a href="{{ url('cursos/'.$curso->id) }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-search"></i> 
                                </a>
                                {{-- Boton de editar --}}
                                <a href="{{ url('cursos/'.$curso->id.'/edit') }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-pen"></i> 
                                </a>
                                {{-- Botono de eliminar con seguridad--}}
                                <form action="{{ url('cursos/'.$curso->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
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

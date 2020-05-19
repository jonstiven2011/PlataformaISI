@extends('layouts.app')

<title>Mis Videos @yield('title')</title>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        {{-- Boton adicionar usuario --}}
        {{-- Color Azul Oscuro #01458E --}}
                <a href="{{url('videos/create')}}" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    Adicionar Video
                </a>
                {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('cursos') }}">Lista de Cursos</a></li>
                <li class="breadcrumb-item"><a href="{{ url('clases') }}">Lista de Clases</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Vídeos</li>
                </ol>
            </nav>
         {{-- Tabla --}}
            <table class="table table-inverse table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Nombre Clase</th>
                        <th>Video</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $item)
                        <tr>
                            <td>{{$item->nameclase}}</td>
                            <td>
                                <video class="video-fluid" id="previeww" muted width="120px" height="100px">
                                    <source src="{{$item->video}}" type="video/mp4" id="preview" >
                                </video>
                            </td>
                            <td>
                                {{-- Boton de buscar --}}
                                <a href="{{ url('videos/'.$item->id) }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-search"></i> 
                                </a>
                                {{-- Boton de editar --}}
                                <a href="{{ url('videos/'.$item->id.'/edit') }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-pen"></i> 
                                </a>
                                {{-- Botono de eliminar con seguridad--}}
                                <form action="{{ url('videos/'.$item->id) }}" method="post" style="display: inline-block;">
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
                        <td colspan="3">
                            {{-- Para paginar --}}
                            {{$videos->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>
@endsection

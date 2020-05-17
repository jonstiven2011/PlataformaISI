@extends('layouts.app')

<title>Mis Clases @yield('title')</title>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        {{-- Boton adicionar usuario --}}
                <a href="{{url('clases/create')}}" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    Adicionar Clase
                </a>
                <a href="{{ url('generate/pdf/clases') }}" class="btn btn-indigo">
                    <i class="fa fa-file-pdf"></i> 
                    Generar Reporte PDF
                </a>
                <a href="{{ url('generate/excel/clases') }}" class="btn btn-indigo">
                    <i class="fa fa-file-excel"></i> 
                    Generar Reporte EXCEL
                </a>
                <br><br>
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
                        <th>Acciones</th>
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
                            <td>
                                <a href="{{$clase->prezi}}" class="btn btn-indigo btn-sm"> 
                                    1-<i class="fa fa-file-import"></i> 
                                </a>
                                <a href="{{$clase->prezi_2}}" class="btn btn-indigo btn-sm"> 
                                    2-<i class="fa fa-file-import"></i> 
                                </a>
                            </td>
                            <td>
                                <a href="{{$clase->formulario}}" class="btn btn-indigo btn-sm"> 
                                   1- <i class="fab fa-google-drive"></i> 
                                </a>
                                <a href="{{$clase->formulario_2}}" class="btn btn-indigo btn-sm"> 
                                    2- <i class="fab fa-google-drive"></i> 
                                 </a>
                            </td>
                            <td>
                                {{-- Boton de buscar --}}
                                <a href="{{ url('clases/'.$clase->id) }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-search"></i> 
                                </a>
                                {{-- Boton de editar --}}
                                <a href="{{ url('clases/'.$clase->id.'/edit') }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-pen"></i> 
                                </a>
                                {{-- Botono de eliminar con seguridad--}}
                                <form action="{{ url('clases/'.$clase->id) }}" method="post" style="display: inline-block;">
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

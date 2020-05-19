@extends('layouts.app')

<title>Editar Video @yield('title')</title>

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--}}
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-plus"></i>
                Modificar Vídeo
            </h1>
            <hr>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('cursos') }}">Lista de Cursos</a></li>
                <li class="breadcrumb-item"><a href="{{ url('videos') }}">Lista de Videos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modificar Video</li>
                </ol>
            </nav>
        <form action="{{url('videos/'.$video->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- Curso_id--}}
                <div class="form-group">
                    <label for="nameclase" class="text-md-right">Nombre de Clase</label>

                        <select name="nameclase" id="clase" class="form-control @error('nameclase') is-invalid @enderror">
                            <option value="">Seleccione...</option>
                            @foreach ($clases as $clase)
                                <option value="{{ $clase->name }}" @if (old('clase', $clase->nameclase) == $clase->id) selected @endif>{{ $clase->name }}</option>
                            @endforeach
                        </select>
                    @error('nameclase')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Video--}}
                <div class="form-group">
                    <label for="video" class="text-md-right">Video</label>
                    <button class="btn btn-indigo btn-block btn-uploadd @error('video') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar Video
                    </button>

                    <input id="video" type="file" class="form-control-file @error('video') is-invalid @enderror d-none" name="video" >
                    <br>
                    {{-- Campo de muestra de video --}}
                    <div class="text-center">
                        {{-- <img src="{{asset('mp4/no_video.mp4')}}" id="preview" class="img-fluid z-depth-1" width="120px"> --}}
                        <video class="video-fluid"  id="previeww" width="120px">
                            <source src="{{asset($video->video)}}" type="video/mp4">
                        </video>
                    </div>

                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-indigo btn-block">
                        <i class="fa fa-save"></i>
                        Modificar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

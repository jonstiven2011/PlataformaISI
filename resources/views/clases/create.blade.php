@extends('layouts.app')

<title>Crear Clase @yield('title')</title>

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--}}
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-plus"></i>
                Adicionar Clase
            </h1>
            <hr>

            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('clases') }}">Lista de Clases</a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Modulo</li>
                </ol>
            </nav>
        <form action="{{url('clases')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Nombre Clase --}}
                <div class="form-group">
                    <label for="name" class="text-md-right">Nombre Clase</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Descripcion--}}
                <div class="form-group">
                    <label for="description" class="text-md-right">Descripción</label>

                    <input id="description" type="texto" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                {{-- Insutrucciones--}}
                <div class="form-group">
                    <label for="instrucciones" class="text-md-right">instrucciones 1</label>
                    <button class="btn btn-indigo btn-block btn-uploadpdf @error('instrucciones') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar PDF
                    </button>

                    <input id="instrucciones" type="file" class="form-control-file @error('instrucciones') is-invalid @enderror d-none" name="instrucciones">
                    <br>
            
                    @error('instrucciones')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- User_Id--}}
                <div class="form-group">
                    <label for="user" class="text-md-right">Usuario</label>
                    <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ $user->fullname }}" autocomplete="user" autofocus disabled="true">
                </div> 
                {{-- Curso_id--}}
                <div class="form-group">
                    <label for="category" class="text-md-right">Curso</label>

                        <select name="curso" id="curso" class="form-control @error('curso') is-invalid @enderror">
                            <option value="">Seleccione...</option>
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}" @if (old('curso', $curso->curso) == $curso->id) selected @endif>{{ $curso->name }}</option>
                            @endforeach
                        </select>
                    @error('curso')
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
                        <video class="video-fluid"  id="previeww" autoplay loop muted width="120px">
                            <source src="{{asset('mp4/no_video.mp4')}}" type="video/mp4" id="preview" >
                        </video>
                    </div>

                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Presentacion--}}
                <div class="form-group">
                    <label for="presentacion" class="text-md-right">Presentacion 1</label>
                    <button class="btn btn-indigo btn-block btn-uupload @error('presentacion') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar presentación
                    </button>

                    <input id="presentacion" type="file" class="form-control-file @error('presentacion') is-invalid @enderror d-none" name="presentacion">
                    <br>
                    {{-- Campo de muestra de presentacionn --}}
                    <div class="text-center">
                        <iframe src="{{asset('presentaciones/no_presentacion_2.pptx')}}" id="preview" frameborder="0" width="320px"></iframe>
                    </div>

                    @error('presentacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Fin Form --}}

                {{-- Presentacion 2--}}
                <div class="form-group">
                    <label for="presentacion_2" class="text-md-right">Presentación 2</label>
                    <button class="btn btn-indigo btn-block btn-uppload @error('presentacion_2') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar presentación 2
                    </button>

                    <input id="presentacion_2" type="file" class="form-control-file @error('presentacion_2') is-invalid @enderror d-none" name="presentacion_2">
                    <br>
                    {{-- Campo de muestra de presentacion_2n --}}
                    <div class="text-center">
                        <iframe src="{{asset('presentaciones/no_presentacion_2.pptx')}}" id="preview" frameborder="0" width="320px"></iframe>
                    </div>

                    @error('presentacion_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Prezi 1 --}}
                <div class="form-group">
                    <label for="prezi" class="text-md-right">Link Prezi 1</label>

                    <input id="prezi" type="text" class="form-control @error('prezi') is-invalid @enderror" name="prezi" value="{{ old('prezi') }}"  autocomplete="prezi" autofocus>

                    @error('prezi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Prezi 2 --}}
                <div class="form-group">
                    <label for="prezi_2" class="text-md-right">Link Prezi 2</label>

                    <input id="prezi_2" type="text" class="form-control @error('prezi_2') is-invalid @enderror" name="prezi_2" value="{{ old('prezi_2') }}"  autocomplete="prezi_2" autofocus>

                    @error('prezi_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Formulario 1 --}}
                <div class="form-group">
                    <label for="formulario" class="text-md-right">Link Formulario 1</label>

                    <input id="formulario" type="text" class="form-control @error('formulario') is-invalid @enderror" name="formulario" value="{{ old('formulario') }}"  autocomplete="formulario" autofocus>

                    @error('formulario')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Formulario 2--}}
                <div class="form-group">
                    <label for="formulario_2" class="text-md-right">Link Furmulario 2</label>

                    <input id="formulario_2" type="text" class="form-control @error('formulario_2') is-invalid @enderror" name="formulario_2" value="{{ old('formulario_2') }}"  autocomplete="formulario_2" autofocus>

                    @error('formulario_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-indigo btn-block">
                        <i class="fa fa-save"></i>
                        Adicionar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

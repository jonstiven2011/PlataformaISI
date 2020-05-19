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
                {{-- Nombre Instrucciones--}}
                <div class="form-group">
                    <label for="nameinstru" class="text-md-right">Nombre Instrucciones</label>

                    <input id="nameinstru" type="texto" class="form-control @error('nameinstru') is-invalid @enderror" name="nameinstru" value="{{ old('nameinstru') }}"  autocomplete="nameinstru">

                    @error('nameinstru')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                {{-- Instrucciones PDF--}}
                <div class="form-group">
                    <label for="instrucciones" class="text-md-right">Instrucciones</label>

                    <button class="btn btn-indigo btn-block btn-uploadpdf @error('instrucciones') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar PDF
                    </button>
                    {{-- Div que muestra el nombre del pdf --}}
                    <div id="infopdf" class="text-danger text-center"></div>

                    <input id="instrucciones" onchange='cambiarpdf()' type="file" class="form-control-file @error('instrucciones') is-invalid @enderror d-none" name="instrucciones">
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
                {{-- Presentacion--}}
                <div class="form-group">
                    <label for="present" class="text-md-right">Presentación 1 PDF</label>
                    <button class="btn btn-indigo btn-block btn-uploadpresent @error('present') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar PDF 1
                    </button>
                    {{-- Div que muestra el nombre del pdf --}}
                    <div id="infopresent" class="text-danger text-center"></div>

                    <input id="present" type="file" onchange='cambiarpresent()' class="form-control-file @error('present') is-invalid @enderror d-none" name="present">
                    <br>
            
                    @error('present')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Presentacion 2--}}
                <div class="form-group">
                    <label for="present_2" class="text-md-right">Presentación 2 PDF</label>
                    <button class="btn btn-indigo btn-block btn-uploadpresent_2 @error('present_2') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar PDF 2
                    </button>
                    {{-- Div que muestra el nombre del pdf --}}
                    <div id="infopresent_2" class="text-danger text-center"></div>

                    <input id="present_2" type="file" onchange='cambiarpresent_2()' class="form-control-file @error('present_2') is-invalid @enderror d-none" name="present_2">
                    <br>
                    
                    @error('present_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Presentacion Drive 1 --}}
                <div class="form-group">
                    <label for="pdrive" class="text-md-right">Link Presentación Drive 1</label>

                    <input id="pdrive" type="text" class="form-control @error('pdrive') is-invalid @enderror" name="pdrive" value="{{ old('pdrive') }}"  autocomplete="pdrive" autofocus>

                    @error('pdrive')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Presentacion Drive 1 --}}
                <div class="form-group">
                    <label for="pdrive_2" class="text-md-right">Link Presentación Drive 2</label>

                    <input id="pdrive_2" type="text" class="form-control @error('pdrive_2') is-invalid @enderror" name="pdrive_2" value="{{ old('pdrive_2') }}"  autocomplete="pdrive_2" autofocus>

                    @error('pdrive_2')
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
<script>
    function cambiarpdf(){
        var pdrs = document.getElementById('instrucciones').files[0].name;
        document.getElementById('infopdf').innerHTML = pdrs;
    }
    function cambiarpresent(){
        var pdrf = document.getElementById('present').files[0].name;
        document.getElementById('infopresent').innerHTML = pdrf;
    }
    function cambiarpresent_2(){
        var pdra = document.getElementById('present_2').files[0].name;
        document.getElementById('infopresent_2').innerHTML = pdra;
    }
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--}}
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-plus"></i>
                Modificar Categoria
            </h1>
            <hr>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('categories') }}">Lista de categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modificar Categoria</li>
                </ol>
            </nav>
        <form action="{{url('categories/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $category->id }}">
                {{-- Nombre Categoria --}}
                <div class="form-group">
                    <label for="name" class="text-md-right">Nombre Categoria</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$category->name) }}"  autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Descripcion--}}
                <div class="form-group">
                    <label for="description" class="text-md-right">Descripción</label>

                    <input id="description" type="texto" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$category->description) }}"  autocomplete="description">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Image--}}
                <div class="form-group">
                    <label for="image" class="text-md-right">Foto</label>
                    <button class="btn btn-indigo btn-block btn-upload @error('image') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar Foto
                    </button>

                    <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror d-none" name="image" accept="image/*" >
                    <br>
                    {{-- Campo de muestra de imagen --}}
                    <div class="text-center">
                        <img src="{{asset($category->image)}}" id="preview" class="img-thumbnail" width="120px">
                    </div>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Fin Form --}}

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

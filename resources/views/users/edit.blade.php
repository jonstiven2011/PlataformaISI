@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--}}
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-pen"></i>
                Modificar Usuario
            </h1>
            <hr>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('users') }}">Lista de Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modificar Usuario</li>
                </ol>
            </nav>
        <form action="{{url('users/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $user->id }}">
                {{-- Nombre Completo --}}
                <div class="form-group">
                    <label for="fullname" class="text-md-right">Nombre Completo</label>

                    <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname',$user->fullname) }}"  autocomplete="fullname" autofocus>

                    @error('fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Nombre Completo --}}
                <div class="form-group">
                    <label for="document" class="text-md-right">Documento</label>

                    <input id="document" type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document',$user->document) }}"  autocomplete="document" autofocus>

                    @error('document')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Correo Electronico --}}
                <div class="form-group">
                    <label for="email" class="text-md-right">Correo Electrónico</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}"  autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Numero Telefonico--}}
                <div class="form-group">
                    <label for="phone" class="text-md-right">Numero Telefonico</label>

                    <input id="phone" type="texto" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone',$user->phone) }}"  autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
{{-- El old lo que hace es recordar el nombre del campo --}}
       
                {{-- Direccion--}}
                <div class="form-group">
                    <label for="address" class="text-md-right">Dirección</label>

                    <input id="address" type="texto" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address',$user->address) }}"  autocomplete="address">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Photo--}}
                <div class="form-group">
                    <label for="photo" class="text-md-right">Foto</label>
                    <button class="btn btn-indigo btn-block btn-upload @error('address') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar Foto
                    </button>

                    <input id="photo" type="file" class="form-control-file @error('photo') is-invalid @enderror d-none" name="photo" accept="image/*" >
                    <br>
                    {{-- Campo de muestra de imagen --}}
                    <div class="text-center">
                        <img src="{{asset($user->photo)}}" id="preview" class="img-thumbnail" width="120px">
                    </div>

                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Contraseña --}}
                <div class="form-group">
                    <label for="password" class="text-md-right">Contraseña:</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Confirmar Contraseña --}}
                <div class="form-group">
                    <label for="password-confirm" class="text-md-right">Confirmar Contraseña:</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">

                    @error('password')
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

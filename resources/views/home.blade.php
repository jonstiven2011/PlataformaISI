@extends('layouts.app')


{{--
    Para iniciar sesion
    <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div> --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Inicio de tarjeta --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <img src="{{ asset('imgs/ISI/icons/users.png') }}" class="card-img-top" height="240px">
                    <div class="card-body">
                        <a href="{{ url('users') }}" class="btn btn-indigo btn-block">Mis Usuarios</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Inicio de tarjeta --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <img src="{{ asset('imgs/ISI/icons/cursos.png') }}" class="card-img-top" height="240px">
                    <div class="card-body">
                        <a href="{{ url('cursos') }}" class="btn btn-indigo btn-block">Mis Cursos</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Inicio de tarjeta --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <img src="{{ asset('imgs/ISI/icons/clases.png') }}" class="card-img-top" height="240px">
                    <div class="card-body">
                        <a href="{{ url('clases') }}" class="btn btn-indigo btn-block">Mis Clases</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

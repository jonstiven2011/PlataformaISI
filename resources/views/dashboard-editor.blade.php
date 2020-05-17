@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Inicio de tarjeta --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <img src="{{ asset('imgs/ISI/icons/cursos.png') }}" class="card-img-top" height="240px">
                    <div class="card-body">
                        <a href="{{ url('mycurso') }}" class="btn btn-indigo btn-block">Mis cursos</a>
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
                        <a href="{{ url('editor') }}" class="btn btn-indigo btn-block">Mis Clases</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
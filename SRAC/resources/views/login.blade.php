@extends('layouts.master')
@section('path')
    @parent > Inicio de Sesion
@endsection
@section('contenido')
    <div class="col-md-8">
        @include('partials.login')
    </div>
@endsection
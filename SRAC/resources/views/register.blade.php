@extends('layouts.principal')

@section('navegador')
    @include('partials.nav')

@endsection


@section('contenido')
    <h3>Formulario de Registro</h3>


    <form action="usuario.store" method="post" class="form-horizontal col-lg-1">
        <label class="control-label" for="usuario">@lang('auth.user')</label>
        <input type="text" name="textUsuario" id="TextUsuario">
        <br>
        <label class="control-label" for="email">@lang('auth.email')</label>
        <input type="text" name="textEmail" id="textEmail">
        <br>
        <label class="control-label" for="password">@lang('auth.password')</label>
        <input type="password" name="password" id="password">
        <br>
        <label class="control-label" for="password2">@lang('auth.password2')</label>
        <input type="password" name="password2" id="password2">
        <br>
        <button class="btn-primary" type="submit">@lang('auth.register')</button>
    </form>

@endsection
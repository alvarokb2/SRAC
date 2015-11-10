@extends('layouts.principal')

@section('styles')

    @endsection
@section('navegador')
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    @include('partials.nav')
@endsection


@section('contenido')
    <h3>Información</h3>
    <p>
        informacion del club
    </p>
    <div class="form-group" id="formulario-registro">
    <h4>Ingresar Cuenta</h4>
        <hr>
    <form action="login" method="post" class="form-horizontal">
        <label class="control-label" for="usuario">@lang('auth.user')</label>
        <input type="text" name="textUsuario" id="TextUsuario">
        <p></p>
        <label class="control-label" for="password">@lang('auth.password')</label>
        <input type="password" name="password" id="password">
        <p></p>
        <button class="btn-primary" type="submit">@lang('auth.login')</button>

    </form>
        <p></p>
        ¿Aun no tienes tu cuenta? <a href="{{Route('usuario.create')}}">@lang('auth.register')</a>

    </div>

@endsection
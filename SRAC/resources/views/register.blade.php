@extends('layouts.principal')

@section('navegador')
    <a href="/">@lang('navbar.home')</a>
    <a href="contact">@lang('navbar.contact')</a>

@endsection


@section('contenido')
    <h3>Formulario de Registro</h3>


    <form action="register" method="post">
        <label for="usuario">@lang('auth.user')</label>
        <input type="text" name="textUsuario" id="TextUsuario">
        <br>
        <label for="email">@lang('auth.email')</label>
        <input type="text" name="textEmail" id="textEmail">
        <br>
        <label for="password">@lang('auth.password')</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="password2">@lang('auth.password2')</label>
        <input type="password2" name="password2" id="password2">
        <br>
        <button type="submit">@lang('auth.register')</button>
    </form>

@endsection
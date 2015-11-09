@extends('layouts.principal')

@section('navegador')
    @include('partials.nav')
@endsection


@section('contenido')
    <h3>Información</h3>
    <p>
        informacion del club
    </p>
    <div class="form-group">
    <form action="login" method="post" class="form-horizontal">
        <label class="control-label" for="usuario">@lang('auth.user')</label>
        <input type="text" name="textUsuario" id="TextUsuario">
        <label class="control-label" for="password">@lang('auth.password')</label>
        <input type="password" name="password" id="password">
        <button class="btn-primary" type="submit">@lang('auth.login')</button>
    </form>
    </div>
    <div>
        Aun no tienes tu cuenta? <a href="{{Route('usuario.create')}}">@lang('auth.register')</a>
    </div>

@endsection
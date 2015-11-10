@extends('layouts.principal')

@section('navegador')
    @include('partials.nav')
@endsection

@section('contenido')
    <h3>Información</h3>
    <p>
        informacion del club
    </p>

    {!! Form::open(['route' => 'usuario.login', 'method' => 'POST']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, [
        'class'         => 'form-control',
        'placeholder'   => 'Nombre de usuario',
        'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', [
        'class'         => 'form-control',
        'placeholder'   => 'Contraseña',
        'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit( 'Ingresar', ['class' => 'btn btn-primary']) !!}
    </div>

    <div class="form-group">
        Aun no tienes tu cuenta? <a href="{{Route('usuario.create')}}">@lang('auth.register')</a>
    </div>



    {!! Form::close() !!}




@endsection
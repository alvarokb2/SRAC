@extends('layouts.master')
@section('path')
    @parent > Formulario de Registro
@endsection
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            @include('alerts.errors')
            <div class="col-md-8">
                {!! Form::open(['route' => 'usuario.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre de Usuario') !!}
                    {!! Form::text('name', null, [
                    'class'         => 'form-control',
                    'placeholder'   => 'Nombre de usuario',
                    'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, [
                    'class'         => 'form-control',
                    'placeholder'   => 'ejemplo@mail.com'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password',[
                    'class'         => 'form-control',
                    'placeholder'   => 'Contraseña'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
                    {!! Form::password('password_confirmation',[
                    'class'         => 'form-control',
                    'placeholder'   => 'Confirmar contraseña'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::submit( 'Registrar', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
@endsection
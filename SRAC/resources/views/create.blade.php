@extends('layouts.principal')


@section('contenido')
    <h3>Formulario de Registro</h3>

    <div class="container-fluid">
        <div class="row">
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
                    'placeholder'   => 'ejemplo@mail.com',
                    'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password',[
                    'class'         => 'form-control',
                    'placeholder'   => 'Contraseña',
                    'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password2', 'Confirmar contraseña') !!}
                    {!! Form::password('password2',[
                    'class'         => 'form-control',
                    'placeholder'   => 'Confirmar contraseña',
                    'required']) !!}
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
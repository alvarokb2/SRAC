@extends('layouts.master')
@section('path')
    @parent > Home
@endsection
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="jumbotron">
                            <h2>Información</h2>
                            <p>Informacion de la compañia.</p>
                            <p>
                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/"/>
                        <br>
                        {!! Form::open(['route' => 'login.store', 'method' => 'POST']) !!}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
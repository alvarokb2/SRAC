@extends('layouts.principal')

@section('styles')

    @endsection
@section('navegador')
    @include('partials.nav')
@endsection

@section('contenido')
    @include('alerts.fail')
    @include('alerts.errors')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <br>
                        <div class="jumbotron">
                            <h2>
                                Información
                            </h2>
                            <p>
                                This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                            </p>
                            <p>
                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" />
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
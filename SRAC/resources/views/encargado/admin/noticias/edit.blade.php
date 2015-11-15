@extends('layouts.principal')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <h3>
                Editar Noticia
            </h3>
            <div class="col-md-2">
                @include('encargado.partials.menu')
            </div>
            <div class="col-md-8">

                {!! Form::open(['route' => 'empleado.admin.noticias.update', 'method' => 'PUT']) !!}

                <input type="hidden" name="id" value="{{$noticia->id}}">

                <div class="form-group">
                    {!! Form::label('titulo', 'Titulo') !!}
                    {!! Form::text('titulo', $noticia->titulo, [
                    'class'         => 'form-control',
                    'placeholder'   => 'Titulo',
                    'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion') !!}
                    {!! Form::text('descripcion', $noticia->descripcion, [
                    'class'         => 'form-control',
                    'placeholder'   => 'Descripcion',
                    'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit( 'Editar', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                

            </div>
        </div>
    </div>
@endsection
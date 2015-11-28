@extends('layouts.master_user')
@section('path')
    @parent > Noticias > Nueva Noticia
@endsection
@section('user_contenido')
    <div class="col-md-8">
        {!! Form::open(['route' => 'empleado.admin.noticias.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('titulo', 'Titulo') !!}
            {!! Form::text('titulo', null, [
            'class'         => 'form-control',
            'placeholder'   => 'Titulo',
            'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripcion') !!}
            {!! Form::text('descripcion', null, [
            'class'         => 'form-control',
            'placeholder'   => 'Descripcion',
            'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit( 'Publicar', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
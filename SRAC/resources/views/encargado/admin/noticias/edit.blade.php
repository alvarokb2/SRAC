@extends('layouts.master_user')
@section('path')
    @parent > Noticias > Editar Noticia
@endsection
@section('user_contenido')
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
            {!! Form::textarea('descripcion', $noticia->descripcion, [
            'class'         => 'form-control',
            'placeholder'   => 'Descripcion',
            'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit( 'Editar', ['class' => 'btn btn-primary']) !!}
            <a href="{{route('empleado.admin.noticias')}}" class="btn btn-danger">Cancelar</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@extends('layouts.master_user')
@section('path')
    @parent > Noticias
@endsection
@section('user_contenido')
    <div class="btn btn-default" id="filter_btn" data-content="#filter_content" data-target="#filter_table">Filtros
        <span class="caret"></span></div>
    <a href="{{route('empleado.admin.noticias.create')}}" class="btn btn-primary">Nueva Noticia</a>
    <div class="filter">
        <div id="filter_content" class="jumbotron form-horizontal"></div>
    </div>
    <table class="table" id="filter_table">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($noticias as $noticia)
            <tr>
                <td>{{$noticia->titulo}}</td>
                <td>{{$noticia->updated_at}}</td>
                <td><a href="{{route('empleado.admin.noticias.edit', $noticia->id)}}" class="btn btn-warning">Editar</a>
                    <a href="{{route('empleado.admin.noticias.destroy', $noticia->id)}}" data-method="delete"
                       class="btn btn-danger">Borrar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
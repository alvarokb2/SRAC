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
            <th>ID</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($noticias as $noticia)
            <tr>
                <td>{{$noticia->id}}</td>
                <td>{{$noticia->titulo}}</td>
                <td>{{$noticia->updated_at}}</td>
                <td>
                    <a href="{{route('empleado.admin.noticias.edit', $noticia->id)}}" class="btn btn-warning">Editar</a>
                    <div class="btn btn-danger" data-toggle="modal" data-target="#modal{{$noticia->id}}">
                        Borrar
                    </div>
                </td>
                <div id="modal{{$noticia->id}}" class="modal fade" role="dialog">
                    @include('encargado.admin.noticias.confirmar_borrar')
                </div>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
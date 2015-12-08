@extends('layouts.master_user')
@section('path')
    @parent > Noticias
@endsection
@section('user_contenido')
    <div class="btn btn-default" id="filter_btn" data-content="#filter_content" data-target="#filter_table">Filtros
        <span class="caret"></span></div>
    <a href="{{route('empleado.admin.noticias.create')}}" class="btn btn-primary">Nueva Noticia</a>
    <div class="filter">
        <div id="filter_content" class="collapse jumbotron form-horizontal"></div>
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
                    <div class="btn btn-primary" data-toggle="modal" data-target="#noticia_ver_{{$noticia->id}}">
                        Ver
                    </div>
                    <a href="{{route('empleado.admin.noticias.edit', $noticia->id)}}" class="btn btn-warning">Editar</a>

                    <div class="btn btn-danger" data-toggle="modal" data-target="#noticia_borrar_modal_{{$noticia->id}}">
                        Borrar
                    </div>
                </td>
                <div id="noticia_borrar_modal_{{$noticia->id}}" class="modal fade" role="dialog">
                    @include('encargado.admin.noticias.confirmar_borrar')
                </div>
                <div id="noticia_ver_{{$noticia->id}}" class="noticias modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        @include('cliente.socio.noticias.noticia')
                    </div>
                </div>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
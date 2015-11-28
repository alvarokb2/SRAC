@extends('layouts.master_user')
@section('path')
    @parent > Noticias
@endsection
@section('user_contenido')
    <a href="{{route('empleado.admin.noticias.create')}}" class="btn btn-primary">Nueva Noticia</a>
    <br>
    <table class="table">
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
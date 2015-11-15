@extends('layouts.principal')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <h3>Noticias</h3>
            <div class="col-md-2">
                @include('encargado.partials.menu')
            </div>
            <div class="col-md-10">
                <a href="{{route('empleado.admin.noticias.create')}}" class="btn btn-primary">Nueva Noticia</a>
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Titulo
                        </th>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Opciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($noticias as $noticia)
                        <tr>
                            <td>{{$noticia->titulo}}</td>
                            <td>{{$noticia->updated_at}}</td>
                            <td><a href="{{route('empleado.admin.noticias.edit', $noticia->id)}}" class="btn btn-warning">Editar</a>
                                <a href="{{route('empleado.admin.noticias.destroy', $noticia->id)}}" data-method="delete" class="btn btn-danger">Borrar</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
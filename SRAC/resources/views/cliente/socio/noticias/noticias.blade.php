@extends('layouts.principal')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <h3>Noticias</h3>
            <div class="col-md-2">
                @include('cliente.partials.menu')
            </div>
            <div class="col-md-10">
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
                            Descripcion
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($noticias as $noticia)
                        <tr>
                            <td>{{$noticia->titulo}}</td>
                            <td>{{$noticia->updated_at}}</td>
                            <td>{{$noticia->descripcion}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.master_user')
@section('path')
    @parent > Noticias
@endsection
@section('user_contenido')
    <table class="table">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Descripcion</th>
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
@endsection
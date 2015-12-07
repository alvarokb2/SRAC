@extends('layouts.master_user')
@section('path')
    @parent > Noticias
@endsection
@section('user_contenido')
    <div class="noticias panel-group">
        @foreach($noticias as $noticia)
            @include('cliente.socio.noticias.noticia')
        @endforeach
    </div>
@endsection
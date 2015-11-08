@extends('layouts.principal')

@section('navegador')
    <a href="/">@lang('navbar.home')</a>
    <a href="contact">@lang('navbar.contact')</a>


@endsection


@section('contenido')
    <h3>Contacto</h3>
    <p>
        Email<br>Direccion<br>Telefono
    </p>
@endsection
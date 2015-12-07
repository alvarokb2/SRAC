@extends('layouts.master')
@section('path')
    @parent > @lang('navbar.home')
@endsection
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="jumbotron">
                            <h2>Información</h2>
                            <p>Nuestro Complejo Deportivo de Fútbol Lideinsenoba tambien conocido como las 7 canchas esta ubicado en la comuna de Cerro Navia a un costado del Complejo Deportivo de Cerro Navia en la calle José Joaquín Pérez 6494.</p>
                            <h3>Misión:</h3>
                            <p>Nuestra Mision es promover el deporte del Fútbol en la comuna , ya sea para equipos deportivos o personas en particular , para así aumentar la practica del deporte con canchas a disposicion y alcance de cualquier persona ,como tambien aumentar el profesionalismo del Fútbol Nacional,entrenando a nuevos talentos para la comuna.</p>
                            <h3>Visión:</h3>
                            <p>Nuestra Vision es ser uno de los complejos deportivos mas reconocidos del país por su infraestructura y tecnologia al servicio de los futbolistas nacionales para así ser un aporte al deporte del país </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @include('partials.login')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.principal')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <h3>Historial</h3>
            <div class="col-md-2">
                @include('cliente.partials.menu')
            </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Hora
                        </th>
                        <th>
                            Estado
                        </th>
                    </tr>
                    </thead>
                    <tbody>
<<<<<<< HEAD
                        @foreach($reservas as $reserva)
                            <tr>
                                <td>{{$reserva->fecha}}</td>
                                <td>{{$reserva->hora}}</td>
                                <td><p class="btn btn-warning">{{$reserva->estado}}</p> </td>
                            </tr>
                        @endforeach
=======

>>>>>>> 194c60fdf897f4038e6610d588ee1f58167c658b
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
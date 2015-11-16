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
                        @foreach($reservas as $reserva)
                            <tr>
                                <td>{{$reserva->fecha}}</td>
                                <td>{{$reserva->hora}}</td>
                                <td><p class="btn btn-warning">{{$reserva->estado}}</p> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
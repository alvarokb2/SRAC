@extends('layouts.master_user')
@section('path')
    @parent > Historial
@endsection
@section('user_contenido')
    <table class="table">
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Auth::user()->reservas() as $reserva)
            <tr>
                <td>{{$reserva->fecha_inicio}}</td>
                <td>{{$reserva->fecha_inicio}}</td>
                <td><p class="btn btn-warning">{{$reserva->estado}}</p></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
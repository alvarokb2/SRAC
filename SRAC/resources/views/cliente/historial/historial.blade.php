@extends('layouts.master_user')
@section('path')
    @parent > Historial
@endsection
@section('user_contenido')
    <table class="table">
        <thead>
        <tr>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Auth::user()->reservas()->orderBy('fecha_inicio', 'desc')->get() as $reserva)
            <tr>
                <td>{{$reserva->fecha_inicio}}</td>
                <td>{{$reserva->fecha_fin}}</td>
                @if($reserva->estado == 'pendiente')
                    <td><p class="btn btn-warning">{{$reserva->estado}}</p></td>
                @elseif($reserva->estado == 'perdida')
                    <td><p class="btn btn-danger">{{$reserva->estado}}</p></td>
                @elseif($reserva->estado == 'completada')
                    <td><p class="btn btn-success">{{$reserva->estado}}</p></td>
                @elseif('cancelada')
                    <td><p class="btn btn-danger">{{$reserva->estado}}</p></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
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
        @foreach(Auth::user()->reservas() as $reserva)
            <?php
                $fecha_inicio = (new DateTime())->setTimestamp($reserva->fecha_inicio);
                $fecha_fin = (new DateTime())->setTimestamp($reserva->fecha_fin);
            ?>
            <tr>
                <td>{{$fecha_inicio->format('d-m-Y H:i:s')}}</td>
                <td>{{$fecha_fin->format('d-m-Y H:i:s')}}</td>
                <td><p class="btn btn-warning">{{$reserva->estado}}</p></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
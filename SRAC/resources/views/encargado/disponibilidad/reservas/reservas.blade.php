@extends('layouts.master_user')
@section('path')
    @parent > Reservas
@endsection
@section('user_contenido')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Horario</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservas as $reserva)
            <tr>
                <td>{{$reserva->id}}</td>
                <td>{{$reserva->fecha_inicio}}</td>
                <td></td>
                <td>{{$reserva->estado}}</td>
                <td><a href="#" class="btn btn-primary">Ver</a></td>
                <!--
                <td><a href="{{route('empleado.reservas.edit',$reserva->id)}}" class="btn btn-primary">Ver</a></td>
                -->
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
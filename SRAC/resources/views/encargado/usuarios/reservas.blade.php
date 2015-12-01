@extends('layouts.master_user')
@section('path')
    @parent > Usuarios (
    @if(isset($name))
        $name
    @endif
    ) > Reservas
@endsection
@section('user_contenido')
    <?php
    use SRAC\Reserva;
    use SRAC\User;
    ?>
    <h4 class="btn btn-default" id="user_reservas_filter_btn">Filtros <span class="caret"></span></h4>
    <table class="table" id="user_reservas_filter_table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Canchas</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Reserva::all() as $reserva)
            <tr>
                <td>{{$reserva->id}}</td>
                <td>{{User::where('id', $reserva->user_id)->get()[0]->name}}</td>
                <td>{{$reserva->fecha_inicio}}</td>
                <td>{{$reserva->fecha_fin}}</td>
                <td>{{$reserva->numero_canchas}}</td>
                <td>{{$reserva->estado}}</td>
                <td><a href="#" class="btn btn-primary">Ver</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

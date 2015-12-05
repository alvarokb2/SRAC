@extends('layouts.master_user')
@section('path')
    @parent > Reservas
@endsection
@section('user_contenido')
    <?php
    use SRAC\User;
    use SRAC\Reserva;
    ?>
    <div class="btn btn-default" id="filter_btn">Filtros <span class="caret"></span></div>
    <table class="table" id="filter_table">
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
        @foreach(Reserva::orderBy('fecha_inicio', 'desc')->orderBy('id', 'asc')->get() as $reserva)
            <tr>
                <td>{{$reserva->id}}</td>
                <td>{{User::where('id', $reserva->user_id)->get()[0]->name}}</td>
                <td>{{$reserva->fecha_inicio}}</td>
                <td>{{$reserva->fecha_fin}}</td>
                <td>
                    <div class="badge">{{$reserva->numero_canchas}}</div>
                </td>
                <td>
                    @include('partials.estado_reserva_btn', ['estado' => $reserva->estado])
                </td>
                <td>
                    @if($reserva->estado == 'pendiente')
                        <a href="#" class="btn btn-success">Confirmar</a>
                        <a href="#" class="btn btn-danger">Cancelar</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
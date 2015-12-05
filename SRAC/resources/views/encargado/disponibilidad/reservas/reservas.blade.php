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
                    <?php $arr = ['route' => 'empleado.reservas.update', 'method' => 'PUT', 'class' => 'form-inine', 'style' => 'display: inline'] ?>
                    @if($reserva->estado == 'pendiente')
                        {!! Form::open($arr) !!}
                        {!! Form::hidden('reserva_id', $reserva->id) !!}
                        {!! Form::hidden('operacion', true) !!}
                        {!! Form::submit('Confirmar', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                        {!! Form::open($arr) !!}
                        {!! Form::hidden('reserva_id', $reserva->id) !!}
                        {!! Form::hidden('operacion', false) !!}
                        {!! Form::submit('Cancelar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
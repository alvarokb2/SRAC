@extends('layouts.master_user')
@section('path')
    @parent > Historial
@endsection
@section('user_contenido')
    <div class="btn btn-default" id="filter_btn" data-content="#filter_content" data-target="#filter_table">Filtros
        <span class="caret"></span></div>
    <div class="filter">
        <div id="filter_content" class="collapse jumbotron form-horizontal"></div>
    </div>
    <table class="table" id="filter_table">
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
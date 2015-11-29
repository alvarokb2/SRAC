@extends('layouts.master_user')
@section('path')
    @parent > Disponibilidad
@endsection
@section('user_contenido')
    @include('cliente.partials.pendiente')
    <?php
    $año = date('Y'); $mes = date('m'); $dia = date('d');
    ?>
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">Horario</th>
            @for($d = 0; $d < Auth::user()->visibleDays(); $d++)
                <?php
                $tiempo = new DateTime();
                $tiempo->setDate($año, $mes, $dia + $d);
                $tiempo->setTime(0, 0);
                ?>
                <th class="text-center">{!! $tiempo->format('d-m-Y') !!}</th>
            @endfor
        </tr>
        </thead>
        <tbody>
        @for($j = 9; $j < 24; $j++) <!-- controla las horas -->
        <tr>
            <td class="text-center">{{ $j . ':00'}}</td>
            @for($i = 0; $i < Auth::user()->visibleDays(); $i++)
                <td class="text-center">
                    {!! Form::open(['route' => 'cliente.reservas.store', 'method' => 'POST']) !!}
                    <?php
                    $tiempo = new DateTime();
                    $tiempo->setDate($año, $mes, $dia + $i);
                    $tiempo->setTime($j, 0);
                    ?>
                    {!! Form::hidden('fecha_inicio', $tiempo->format('d-m-Y H:i:s'), ['class' => 'form-control']  ) !!}
                    <?php $tiempo->setTime($j + 1, 0) ?>
                    {!! Form::hidden('fecha_fin', $tiempo->format('d-m-Y H:i:s'), ['class' => 'form-control']) !!}
                    <a class="btn btn-primary">Reservar</a>
                    {!! Form::close() !!}
                </td>
            @endfor
        </tr>
        @endfor
        </tbody>
    </table>
@endsection

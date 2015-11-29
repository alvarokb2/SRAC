@extends('layouts.master_user')
@section('path')
    @parent > Disponibilidad
@endsection
@section('user_contenido')
    <?php
    $anio = date('Y'); $mes = date('m'); $dia = date('d');
    ?>
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">Horario</th>
            @for($d = 0; $d < Auth::user()->visibleDays(); $d++)
                <?php
                $tiempo = new DateTime();
                $tiempo->setDate($anio, $mes, $dia + $d);
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
                    $tiempo->setDate($anio, $mes, $dia + $i);
                    $tiempo->setTime($j, 0);
                    ?>
                    {!! Form::hidden('fecha_inicio', $tiempo->getTimestamp(), ['class' => 'form-control']  ) !!}
                    <?php $tiempo->setTime($j + 1, 0) ?>
                    {!! Form::hidden('fecha_fin', $tiempo->getTimestamp(), ['class' => 'form-control']) !!}
                    {!! Form::submit('Reservar', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </td>
            @endfor
        </tr>
        @endfor
        </tbody>
    </table>
@endsection

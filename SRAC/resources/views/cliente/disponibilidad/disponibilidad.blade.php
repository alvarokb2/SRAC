@extends('layouts.master_user')
@section('path')
    @parent > Disponibilidad
@endsection
@section('user_contenido')
    <?php
    use SRAC\Reserva;
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
                    $fecha_inicio = new DateTime();
                    $fecha_inicio->setDate($anio, $mes, $dia + $i);
                    $fecha_inicio->setTime($j, 0);
                    $fecha_fin = new DateTime();
                    $fecha_fin->setDate($anio, $mes, $dia + $i);
                    $fecha_fin->setTime($j + 1, 0);
                    $reserva = Reserva::createReserva($fecha_inicio, $fecha_fin, 1, Auth::user()->id);
                    if (method_exists('SRAC\Reserva', 'getStatus')) {
                        $estado = Reserva::getStatus($reserva);
                    };
                    ?>
                    @if(isset($estado))
                        @if($estado == 'disponible')
                            {!! Form::hidden('fecha_inicio', $fecha_inicio->getTimestamp(), ['class' => 'form-control']  ) !!}
                            {!! Form::hidden('fecha_fin', $fecha_fin->getTimestamp(), ['class' => 'form-control']) !!}
                            {!! Form::submit('Reservar', ['class' => 'btn btn-primary']) !!}
                        @elseif($estado == 'no disponible')
                            <a class="btn btn-default">No Disponible</a>
                        @else
                            @include('partials.estado_reserva_btn')
                        @endif
                    @endif
                    {!! Form::close() !!}
                </td>
            @endfor
        </tr>
        @endfor
        </tbody>
    </table>
@endsection

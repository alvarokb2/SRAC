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
        @for($j = 9; $j < 24; $j++)
            <tr>
                <td class="text-center">{{ $j . ':00'}}</td>
                @for($i = 0; $i < Auth::user()->visibleDays(); $i++)
                    <td class="text-center">
                        <?php
                        $fecha_inicio = new DateTime();
                        $fecha_inicio->setDate($anio, $mes, $dia + $i);
                        $fecha_inicio->setTime($j, 0);
                        $fecha_fin = new DateTime();
                        $fecha_fin->setDate($anio, $mes, $dia + $i);
                        $fecha_fin->setTime($j + 1, 0);
                        $reserva = Reserva::createReserva($fecha_inicio, $fecha_fin, 1, Auth::user()->id);
                        $estado = Reserva::getStatus($reserva);
                        ?>
                        @if($estado == 'disponible')
                            <div class="btn btn-primary" data-toggle="modal" data-target="#modal{{$i}}-{{$j}}">
                                Reservar
                            </div>
                        @elseif($estado == 'no disponible')
                            <a class="btn btn-danger">No Disponible</a>
                        @else
                            @include('partials.estado_reserva_btn')
                        @endif
                    </td>
                    <div id="modal{{$i}}-{{$j}}" class="modal fade" role="dialog">
                        @include('cliente.disponibilidad.confirmar')
                    </div>
                @endfor
            </tr>
        @endfor
        </tbody>
    </table>
@endsection

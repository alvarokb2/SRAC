@extends('layouts.master_user')
@section('path')
    @parent > Disponibilidad
@endsection
@section('user_contenido')
    <?php
    use SRAC\Utilidades;
    use SRAC\Reserva;
    $user = Auth::user();
    $user_status = $user->getStatus();
    if ($user_status == 'suspendido') {
        $fecha_perdida = DateTime::createFromFormat(
            "Y-m-d H:i:s",
            Reserva::where('user_id', $user->id)->where('estado', 'perdida')->orderBy('fecha_inicio', 'desc')->get()[0]->fecha_inicio
        );
        $fecha_habilitacion = new DateTime();
        $fecha_habilitacion->setTimestamp($fecha_perdida->getTimestamp());
        $fecha_habilitacion->add(new DateInterval('P' . Utilidades::$dias_castigo . 'D'));
    }
    if ($user_status == 'pendiente') {
        $fecha_pendiente = DateTime::createFromFormat(
            "Y-m-d H:i:s",
            Reserva::where('user_id', $user->id)->where('estado', 'pendiente')->orderBy('fecha_inicio', 'desc')->get()[0]->fecha_inicio
        );
    }
    $anio = date('Y'); $mes = date('m'); $dia = date('d');
    ?>
    @if($user_status == 'suspendido')
        @include('info.usuario_suspendido')
    @elseif($user_status == 'pendiente')
        @include('info.reservas_pendientes')
    @endif
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
                            @if($user_status == 'suspendido' || $user_status == 'pendiente')
                                <div class="btn btn-primary">
                                    <strike>Reservar</strike>
                                </div>
                            @else
                                <div class="btn btn-primary" data-toggle="modal" data-target="#modal{{$i}}-{{$j}}">
                                    Reservar
                                </div>
                            @endif
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

@extends('layouts.master_user')
@section('path')
    @parent > Disponibilidad
@endsection
@section('user_contenido')
    <?php
    use SRAC\Utilidades;
    use SRAC\Reserva;
    use SRAC\User;
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
                    $reserva_aux = Reserva::createReserva($fecha_inicio, $fecha_fin, 1, Auth::user()->id);
                    $estado = Reserva::getStatus($reserva_aux);
                    $reservas_aux = Reserva::where('fecha_inicio', $fecha_inicio->format('Y-m-d H:i:s'))->get();
                    $count = $reservas_aux->count();
                    $count_max = Reserva::countMax($reserva_aux);
                    ?>
                    <div class="dropdown">
                        @if($estado == 'disponible')
                            <div class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Disponible
                                @if($count > 0)
                                    <span class="badge">{{$count_max}}</span> <span class="caret"/>
                                @endif
                            </div>
                        @else
                            <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown">No Disponible
                                @if($count > 0)
                                    <span class="badge">{{$count_max}}</span> <span class="caret"/>
                                @endif
                            </a>
                        @endif
                        @if($count > 0)
                            <ul class="dropdown-menu dropdown-menu-left">
                                <?php $ocupadas = 0 ?>
                                @for($index = 0; $index < $count; $index++)
                                    <?php
                                    $reserva = $reservas_aux[$index];
                                    $estado = $reserva->estado;
                                    $ocupadas = $ocupadas + ($estado == 'cancelada' ? 0 : $reserva->numero_canchas);
                                    ?>
                                    <li>
                                        <a>
                                            ({{$reserva->id}}) {{User::where('id', $reserva->user_id)->get()[0]->name}}
                                            <span class="badge">{{$reserva->numero_canchas}}</span>
                                            @include('partials.estado_reserva_btn', ['estado' => $estado])
                                        </a>
                                    </li>
                                @endfor
                                <?php $disponibles = Utilidades::$numero_canchas - $ocupadas ?>
                                @if($disponibles == 0)
                                    <li><a>No quedan canchas <span class="btn btn-primary">disponibles</span></a></li>
                                @elseif($disponibles == 1)
                                    <li><a>Queda <span class="badge">{{$disponibles}}</span> cancha <span
                                                class="btn btn-primary">disponible</span></a></li>
                                @elseif($disponibles > 1)
                                    <li><a>Quedan <span class="badge">{{$disponibles}}</span> canchas <span
                                                class="btn btn-primary">disponibles</span></a></li>
                                @endif
                            </ul>
                        @endif
                    </div>
                </td>
            @endfor
        </tr>
        @endfor
        </tbody>
    </table>
@endsection

@extends('layouts.principal')

@section('contenido')

    visible days : {{Auth::user()->visibleDays()}}
<br>
    @if(date('d') == (date('d', time()-1)))
    fecha/hora : {{date('d m Y H:i:s', (86400*(365+0.24)*21))}}
    @endif
    <br>
    pendientes:
    @if(Auth::user()->hasPending())
        true
    @else
        false
    @endif
    <br>
    sancionado:
    @if(Auth::user()->isSanctioned(5))
        true
    @else
        false
    @endif
    <br>
    puede reservar:
    @if(Auth::user()->available())
        true
    @else
        false
    @endif
    <br>
    @foreach($reservas as $reserva)
        <br>
        {{$reserva->fecha_inicio}}

    @endforeach
    <br>

    {{Auth::user()->reservas()->where('estado', '=', 'perdida')->get()}}
@endsection
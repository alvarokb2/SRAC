@extends('layouts.master')
@section('path')
    @parent > Test
@endsection
@section('contenido')
@if(Auth::user())

    <a href="{{route('empleado.reservas.showreservasusuario', 1)}}">ahipo</a>

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
    @foreach(Auth::user()->reservas() as $reserva)
        <br>
        {{$reserva->fecha_inicio}}
    @endforeach
    <br>
    {{Auth::user()->reservas()->where('estado', '=', 'perdida')->get()}}
@endif
@endsection
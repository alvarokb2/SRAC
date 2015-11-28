@extends('layouts.principal')

@section('contenido')

    visible days : {{Auth::user()->visibleDays()}}
<br>
    fecha/hora : {{date('d m Y H:i:s', (86400*(365+0.20)*21))}}
    @if(Auth::user()->hasPending())
        true
    @else
        false
    @endif

    {{Auth::user()->reservas()->where('estado', '=', 'perdida')->get()}}
@endsection
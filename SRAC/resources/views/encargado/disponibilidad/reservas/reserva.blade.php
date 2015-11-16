@extends('layouts.principal')

@section('contenido')


    <div class="container-fluid">
        <div class="row">
            <h3>Confirmar Reserva</h3>
            <div class="col-md-2">
                @include('encargado.partials.menu')
            </div>
            <div class="col-md-10">
                <span><h3>{{'Reserva Numero:'.$reserva->id}}</h3></span>
                <span>{{'Fecha:'.' '.$reserva->fecha}}</span>
                <br>
                <span>{{'Horario:'.' '.$reserva->hora}}</span>

                {!! Form::open(['route' => 'empleado.reservas.update', 'method' => 'PUT']) !!}
                <br>
                <input type="hidden" name="id" value="{{$reserva->id}}">
                {!! Form::submit('Confirmar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@extends('layouts.master_user')
@section('path')
    @parent > Disponibilidad
@endsection
@section('user_contenido')
    <table class="table">
        <thead>
        <tr>
            <th>Horario</th>
            @for($i = 0; $i < Auth::user()->visibleDays(); $i++)
                <th>{!! date("j-n-Y", time()+ $i * 86400)!!}</th>
            @endfor
        </tr>
        </thead>
        <tbody>
        @for($j = 0; $j < 15; $j++)
            <tr>
                <td>{{($j + 9).':00'}}</td>
                @for($i = 0; $i < Auth::user()->visibleDays(); $i++)
                    <td>
                        <a href="#" class="btn btn-primary">Reservar</a>
                    </td>
                    <!--
                    <td>{!! Form::open(['route' => 'empleado.reservas.store', 'method' => 'POST']) !!}
                        <input type="hidden" name="hora" value="{{ $j+9 . ':00' }}">
                        <input type="hidden" name="fecha" value="{{$i}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        {!! Form::submit( 'Reservar', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </td>
                    -->
                @endfor
            </tr>
        @endfor
        </tbody>
    </table>
@endsection

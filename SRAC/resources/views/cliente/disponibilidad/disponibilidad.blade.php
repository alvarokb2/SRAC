@extends('layouts.principal')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <h3>Disponibilidad</h3>
            <div class="col-md-2">
                @include('cliente.partials.menu')
            </div>
            <div class="col-md-10">
@include('cliente.partials.pendiente')
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Horario
                        </th>

                        @for($d = 0; $d < Auth::user()->getDias(); $d++)
                        <th>
                            {!! date('j-n-y', time() + ($d * 86400))!!}
                        </th>
                        @endfor
                    </tr>
                    </thead>
                    <tbody>
                    @for($j = 0;$j <15;$j++)
                        <tr>
                            <td>{{($j + 9).':00'}}</td>
                            @for($i = 0; $i <Auth::user()->getDias(); $i++)
                                <td>{!! Form::open(['route' => 'cliente.reservas.store', 'method' => 'POST']) !!}
                                    <input type="hidden" name="hora" value="{{ $j+9 . ':00' }}">
                                    <input type="hidden" name="fecha" value="{{ date('j-n-y', time() + ($i * 86400)) }}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                    @if(!Auth::user()->disponibilidad( date('j-n-y', time() + ($i * 86400)), $j+9 . ':00') > 0)
                                        <div class="btn btn-warning">Reservada</div>
                                    @else
                                        @if($reserva->disponibilidad(date('j-n-y', time() + ($i * 86400)), $j+9 . ':00'))
                                            {!! Form::submit( 'Disponible', ['class' => 'btn btn-success']) !!}
                                        @else
                                            <div class="btn btn-danger">No Disponible</div>
                                        @endif
                                    @endif



                                    {!! Form::close() !!}</td>
                            @endfor
                        </tr>
                    @endfor

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

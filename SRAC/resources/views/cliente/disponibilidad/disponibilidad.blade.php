@extends('layouts.principal')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <h3>Disponibilidad</h3>
            <div class="col-md-2">
                @include('cliente.partials.menu')
            </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Horario
                        </th>
                        <th>
                            {!! date("j-n")!!}
                        </th>
                        <th>
                            {!! date("j-n",time() + 86400)!!}
                        </th>
                        <th>
                            {!! date("j-n",time() + ( 86400 * 2 ) )!!}
                        </th>
                        <th>
                            {!! date("j-n",time() + ( 86400 * 3 ) )!!}
                        </th>
                        <th>
                            {!! date("j-n",time() + ( 86400 * 4 ) )!!}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($j = 0;$j <15;$j++)
                        <tr>
                            <td>{{($j + 9).':00'}}</td>
                            @for($i = 0; $i <5; $i++)
                                <td>{!! Form::open(['route' => 'cliente.reservas.store', 'method' => 'POST']) !!}
                                    <input type="hidden" name="hora" value="{{ $j+9 . ':00' }}">
                                    <input type="hidden" name="fecha" value="{{$i}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                    @if($reserva->disponibilidad( date('j-n-y', time() + ($i * 86400)), $j+9 . ':00'))
                                        {!! Form::submit( 'Disponible', ['class' => 'btn btn-success']) !!}
                                    @else
                                        <div class="btn btn-danger">No Disponible</div>
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

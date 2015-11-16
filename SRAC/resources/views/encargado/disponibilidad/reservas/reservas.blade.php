@extends('layouts.principal')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <h3>Reservas</h3>
            <div class="col-md-2">
                @include('encargado.partials.menu')
            </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Horario
                        </th>
                        <th>
                            Usuario
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            Opciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservas as $reserva)
                        <tr>
                            <td>{{$reserva->id}}</td>
                            <td>{{$reserva->hora}}</td>
                            <td></td>
                            <td>{{$reserva->estado}}</td>
                            <td><a href="{{route('empleado.reservas.edit',$reserva->id)}}" class="btn btn-primary">Ver</a></td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
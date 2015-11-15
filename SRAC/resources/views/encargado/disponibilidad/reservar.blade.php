@extends('layouts.principal')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <h3>
                Reservar
            </h3>
            <div class="col-md-2">
                @include('administrador.partials.menu')
            </div>
            <div class="col-md-8">
                <label for="fecha">{{'Fecha: '.'$fecha'}}</label>
                <br>
                <label for="fecha">{{'Horario: '.'$horario'}}</label>

                <form role="form">

                    <div class="form-group">
                        <label for="periodos">
                            Periodos
                        </label>
                        <input type="number" class="dropdown" max="16" min="1"/>
                    </div>

                    <div class="form-group">
                        <label for="cantidadCanchas">
                            Cantidad Canchas
                        </label>
                        <input type="number" class="dropdown" max="3" min="1"/>
                    </div>

                    <div class="form-group">
                        <label for="motivo">
                            Motivo
                        </label>
                        <input type="text" class="form-control" placeholder="motivo"/>
                    </div>
                    <button type="submit" class="btn btn-default">
                        Reservar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
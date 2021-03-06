@extends('layouts.master_user')
@section('path')
    @parent > Usuarios ({{isset($user) ? $user->name : ''}}) > Reservar Lotes
@endsection
@section('user_contenido')
    <div class="col-md-8">
        {!! Form::open(['route' => 'empleado.reservas.storeMany', 'method' => 'POST']) !!}
        {!! Form::hidden('user_id', isset($user) ? $user->id : 0) !!}
        <div class="form-group">
            {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
            {!! Form::text('fecha_inicio', '', [
            'class'         => 'form-control datetimepicker',
            'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fecha_fin', 'Fecha Fin') !!}
            {!! Form::text('fecha_fin', '', [
            'class'         => 'form-control datetimepicker',
            'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dias', 'Dias', ['class' => 'label-block']) !!}
            <div>
                <label class="checkbox-inline">{!! Form::checkbox('lunes', '1', true) !!} Lunes</label>
                <label class="checkbox-inline">{!! Form::checkbox('martes', '2', true) !!} Martes</label>
                <label class="checkbox-inline">{!! Form::checkbox('miercoles', '3', true) !!} Miercoles</label>
                <label class="checkbox-inline">{!! Form::checkbox('jueves', '4', true) !!} Jueves</label>
                <label class="checkbox-inline">{!! Form::checkbox('viernes', '5', true) !!} Viernes</label>
                <label class="checkbox-inline">{!! Form::checkbox('sabado', '6', true) !!} Sabado</label>
                <label class="checkbox-inline">{!! Form::checkbox('domingo', '7', true) !!} Domingo</label>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('numero_canchas', 'Numero de Canchas') !!}
            <select name="numero_canchas" class="form-control">
                @for($index = 1; $index <= \SRAC\Utilidades::$numero_canchas; $index++)
                    <option>{{$index}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            {!! Form::submit('Reservar', ['class' => 'btn btn-primary']) !!}
            <a href="{{route('empleado.usuarios')}}" class="btn btn-danger">Cancelar</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@extends('layouts.master_user')
@section('path')
    @parent > Usuarios > Editar
@endsection
@section('user_contenido')
    <div class="col-md-8">
        {!! Form::open(['route' => 'usuario.update', 'method' => 'PUT'])!!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre de Usuario') !!}
            {!! Form::text('name', $user->name, [
            'class'         => 'form-control',
            'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', $user->email,
                ['class' => 'form-control', 'required']
            )
            !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password',[
                'class'         => 'form-control',
                'placeholder'   => '********'])
            !!}
        </div>
        <div class="form-group">
            {!! Form::label('role', 'Rol') !!}
            @if(Auth::user()->role == 'administrador')
                {!! Form::select('role',
                    ['cliente' => 'cliente', 'socio' => 'socio', 'encargado' => 'encargado', 'administrador' => 'administrador'],
                    $user->role,
                    ['class' => 'form-control'])
                !!}
            @else
                {!! Form::select('role',
                    ['cliente' => 'cliente', 'socio' => 'socio', 'encargado' => 'encargado'],
                    $user->role,
                    ['class' => 'form-control'])
                !!}
            @endif
        </div>
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="form-group">
            {!! Form::submit( 'Editar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
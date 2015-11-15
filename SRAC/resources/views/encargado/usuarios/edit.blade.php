@extends('layouts.principal')


@section('contenido')
    <h3>Editar Usuario</h3>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                @include('encargado.partials.menu')
            </div>
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
                    {!! Form::email('email', $user->email, [
                    'class'         => 'form-control',
                    'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password',[
                    'class'         => 'form-control',
                    'placeholder'   => '********']) !!}
                </div>



                <div class="form-group">
                    {!! Form::label('role', 'Rol') !!}
                    <select name="role" class="form-control" >
                        <option>cliente</option>
                        <option>socio</option>
                        <option>encargado</option>
                        <option>administrador</option>
                    </select>

                </div>

                <input type="hidden" name="id" value="{{$user->id}}">

                <div class="form-group">

                    {!! Form::submit( 'Editar', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
                <a href="{{route('empleado.usuarios.destroy', $user->id)}}" class="btn btn-danger">Borrar</a>
                </div>

            </div>


        </div>
        <div class="col-md-2">
        </div>
    </div>
    </div>
@endsection
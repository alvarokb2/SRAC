@extends('layouts.master_user')
@section('path')
    @parent > Usuarios
@endsection
@section('user_contenido')
    <div class="col-lg-12">
        {!! Form::text('buscar', '', ['id' => 'user_filter' ,'class' => 'col-lg-4 form-control']) !!}
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo Electronico</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody id="user_table">
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td class="user_name">{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td></td>
                <td>
                    @if(Auth::user()->role == 'administrador')
                        <a href="{{route('empleado.usuarios.edit', $user->id)}}" class="btn btn-warning">Editar</a>
                        @if(Auth::user() != $user)
                            <a href="{{route('empleado.usuarios.destroy', $user->id)}}" class="btn btn-danger">Borrar</a>
                        @endif
                    @else
                        @if($user->role == 'cliente' or $user->role == 'socio')
                            <a href="{{route('empleado.usuarios.edit', $user->id)}}" class="btn btn-warning">Editar</a>
                            <a href="{{route('empleado.usuarios.destroy', $user->id)}}" class="btn btn-danger">Borrar</a>
                        @else
                            <a href="#" class="btn btn-primary">No Disponible</a>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

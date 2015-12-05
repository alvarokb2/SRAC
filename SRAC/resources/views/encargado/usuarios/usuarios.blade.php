@extends('layouts.master_user')
@section('path')
    @parent > Usuarios
@endsection
@section('user_contenido')
    <div>
        <div class="btn btn-default" id="filter_btn">Filtros <span class="caret"></span></div>
        <table class="table" id="filter_table">
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
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td><a class="btn btn-primary">{{$user->getStatus()}}</a></td>
                    <td>
                        @if(Auth::user()->role == 'administrador')
                            <a href="{{route('empleado.usuarios.edit', $user->id)}}" class="btn btn-warning">Editar</a>
                            @if(Auth::user() != $user)
                                <a href="{{route('empleado.usuarios.destroy', $user->id)}}" class="btn btn-danger">Borrar</a>
                            @endif
                        @else
                            @if($user->role == 'cliente' or $user->role == 'socio')
                                <a href="{{route('empleado.usuarios.edit', $user->id)}}"
                                   class="btn btn-warning">Editar</a>
                                <a href="{{route('empleado.usuarios.destroy', $user->id)}}" class="btn btn-danger">Borrar</a>
                            @else
                                <a href="#" class="btn btn-primary">No Disponible</a>
                            @endif
                        @endif
                        <a href="{{route('empleado.reservas.reservarlotes', $user->id)}}" class="btn btn-primary">Reservar Lotes</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

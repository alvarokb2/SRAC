@extends('layouts.master_user')
@section('path')
    @parent > Usuarios
@endsection
@section('user_contenido')
    <div>
        <div class="btn btn-default" id="filter_btn" data-content="#filter_content" data-target="#filter_table">Filtros
            <span class="caret"></span></div>
        <div class="filter">
            <div id="filter_content" class="jumbotron form-horizontal"></div>
        </div>
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
                    <td>
                        <!--
                        if($this->isSanctioned(5)){
                        return 'suspendido';
                        }
                        elseif($this->hasPending()){
                        return 'pendiente';
                        }
                        else{
                        return 'disponible';
                        } -->
                        <?php $status = $user->getStatus() ?>
                        @if($status == 'pendiente')
                            <a href="#" class="btn btn-warning">{{$user->getStatus()}}</a>
                        @elseif($status == 'suspendido')
                            <a href="#" class="btn btn-danger">{{$user->getStatus()}}</a>
                        @elseif($status == 'disponible')
                            <a href="#" class="btn btn-primary">{{$user->getStatus()}}</a>
                        @else
                            <a href="#" class="btn btn-default">Estado no Controlado</a>
                        @endif
                    </td>
                    <td>
                        @if(Auth::user()->role == 'administrador')
                            <a href="{{route('empleado.usuarios.edit', $user->id)}}" class="btn btn-warning">Editar</a>
                            @if(Auth::user() != $user)
                                <div class="btn btn-danger" data-toggle="modal" data-target="#modal{{$user->id}}">
                                    Borrar
                                </div>
                            @endif
                        @else
                            @if($user->role == 'cliente' or $user->role == 'socio')
                                <a href="{{route('empleado.usuarios.edit', $user->id)}}"
                                   class="btn btn-warning">Editar</a>
                                <div class="btn btn-danger" data-toggle="modal" data-target="#modal{{$user->id}}">
                                    Borrar
                                </div>
                            @else
                                <a href="#" class="btn btn-primary">No Disponible</a>
                            @endif
                        @endif
                        <a href="{{route('empleado.reservas.reservarlotes', $user->id)}}" class="btn btn-primary">Reservar
                            Lotes</a>
                    </td>
                    <div id="modal{{$user->id}}" class="modal fade" role="dialog">
                        @include('encargado.usuarios.confirmar_borrar')
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

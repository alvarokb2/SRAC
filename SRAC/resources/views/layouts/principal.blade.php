<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>


    <link href="{{asset('assets/layoutPrincipal/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/layoutPrincipal/css/style.css')}}" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">
                Sistema de Reserva y Arriendo de Canchas
            </h3>
            <ul class="nav nav-tabs">
                <li>
                    @if(Auth::user())
                        @if(Auth::user()->role == 'administrador' or Auth::user()->role == 'encargado')
                            <a href="{{route('empleado.usuarios')}}">Home</a>
                        @elseif(Auth::user()->role == 'cliente' or Auth::user()->role == 'socio')
                            <a href="{{route('cliente.reservas')}}">Home</a>
                        @endif
                    @else
                        <a href="{{route('/')}}">Home</a>
                    @endif
                </li>
                <li>
                    <a href="{{route('contact')}}">Contacto</a>
                </li>
                @if(Auth::user())
                    <li class="dropdown pull-right">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">{{Auth::user()->name}}<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('logout')}}">Salir</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            @yield('contenido')
        </div>
    </div>
</div>

<script src="{{asset('assets/layoutPrincipal/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/layoutPrincipal/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/layoutPrincipal/js/scripts.js')}}"></script>
</body>
</html>
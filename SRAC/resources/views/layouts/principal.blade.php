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
                    <a href="{{route('/')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('contact')}}">Contacto</a>
                </li>
                <li>
                    <a href="{{route('/')}}">Ayuda</a>
                </li>
                @if(Auth::user())
                    <li class="dropdown pull-right">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">{{Auth::user()}}<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Mi cuenta</a>
                            </li>
                            <li>
                                <a href="#">Salir</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @yield('contenido')
        </div>
    </div>
</div>

<script src="{{asset('assets/layoutPrincipal/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/layoutPrincipal/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/layoutPrincipal/js/scripts.js')}}"></script>
</body>
</html>
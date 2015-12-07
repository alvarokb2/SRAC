<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>@yield('titulo', 'SRAC')</title>
    {!! Html::style('assets/layoutPrincipal/css/bootstrap.min.css') !!}
    {!! Html::style('assets/layoutPrincipal/css/jquery.datetimepicker.css') !!}
    {!! Html::style('assets/layoutPrincipal/css/style.css') !!}
    {!! Html::script('assets/layoutPrincipal/js/jquery.min.js') !!}
    {!! Html::script('assets/layoutPrincipal/js/bootstrap.min.js') !!}
    {!! Html::script('assets/layoutPrincipal/js/jquery.datetimepicker.full.min.js') !!}
    {!! Html::script('assets/layoutPrincipal/js/scripts.js') !!}
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Sistema de Reserva y Arriendo de Canchas</h3>
        </div>
        <div class="col-md-12">
            @include('partials.navbar')
        </div>
        <div class="col-md-12">
            <h3>@yield('path')</h3>
        </div>
        <div class="col-md-12">
            <br>
        </div>
        <div class="col-md-12">
            @include('alerts.errors')
            @include('alerts.fail')
            @include('alerts.success')
            @yield('contenido')
        </div>
    </div>
</div>
</body>
</html>
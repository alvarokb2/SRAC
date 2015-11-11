<!doctype html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>SRAC</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}"></head>
    @yield('styles')
<style type="text/css">
    body{
        background-color: #4cae4c;
    }

</style>
<body>

    <h1 align="center">Sistema de Reserva y arriendo de canchas</h1>
    <hr>

    <div align="center">@yield('navegador')</div>
    <hr>

    @yield('contenido')

    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
</body>

</html>
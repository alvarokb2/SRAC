
    <br>
    <div class="btn-group btn-group-vertical btn-group-lg">

        <a href="{{route('empleado.usuarios')}}" class="btn btn-default" type="button">
            <em class="glyphicon glyphicon-user"></em> Usuarios
        </a>
        <a href="{{route('empleado.reservas.create')}}" class="btn btn-default" type="button">
            <em class="glyphicon glyphicon-th"></em> Disponibilidad
        </a>
        <a href="#" class="btn btn-default" type="button">
            <em class="glyphicon glyphicon-time"></em> Reservas
        </a>
        @if(Auth::user()->role == 'administrador')
        <a href="{{route('empleado.admin.noticias')}}" class="btn btn-default" type="button">
            <em class="glyphicon glyphicon-globe"></em> Noticias
        </a>
            @endif
    </div>

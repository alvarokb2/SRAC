<div class="btn-group btn-group-vertical btn-group-lg">
    <a href="{{route('cliente.reservas.create')}}" class="btn btn-default" type="button">
        <em class="glyphicon glyphicon-th"></em> Disponibilidad
    </a>
    <a href="{{route('cliente.reservas')}}" class="btn btn-default" type="button">
        <em class="glyphicon glyphicon-time"></em> Historial
    </a>
    @if(Auth::user()->role == 'socio')
        <a href="{{route('cliente.socio.noticias')}}" class="btn btn-default" type="button">
            <em class="glyphicon glyphicon-globe"></em> Noticias
        </a>
    @endif
</div>

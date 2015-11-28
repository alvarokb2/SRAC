@if(Auth::user())
    @if(Auth::user()->role == 'cliente' or Auth::user()->role == 'socio')
        @include('cliente.partials.menu')
    @else
        @include('encargado.partials.menu')
    @endif
@endif
<ul class="nav nav-tabs">
    <li><a href="{{route('/')}}">Home</a></li>
    <li><a href="{{route('contact')}}">Contacto</a></li>
    <li><a href="{{route('test')}}">Test</a></li>
    @if(Auth::user())
        <li class="dropdown pull-right">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                {{Auth::user()->name}}<spam class="caret"></spam>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{route('logout')}}">Salir</a></li>
            </ul>
        </li>
    @endif
</ul>
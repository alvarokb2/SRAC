<nav class="nav nav-tabs">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="{{route('/')}}">@lang('navbar.home')</a></li>
                <li><a href="{{route('contact')}}">@lang('navbar.contact')</a></li>
                <li><a href="{{route('test')}}">Test</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
                    <li class="dropdown pull-right">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            {{Auth::user()->name}}
                            <spam class="caret"></spam>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('logout')}}">@lang('navbar.logout')</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{route('usuario.create')}}"><span class="glyphicon glyphicon-user"></span> Registrate</a></li>
                    <li><a href="{{route('login.create')}}"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
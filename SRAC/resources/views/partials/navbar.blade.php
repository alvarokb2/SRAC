<ul class="nav nav-tabs">
    <li><a href="{{route('/')}}">@lang('navbar.home')</a></li>
    <li><a href="{{route('contact')}}">@lang('navbar.contact')</a></li>
    <li><a href="{{route('test')}}">Test</a></li>
    @if(Auth::user())
        <li class="dropdown pull-right">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                {{Auth::user()->name}}<spam class="caret"></spam>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{route('logout')}}">@lang('navbar.logout')</a></li>
            </ul>
        </li>
    @endif
</ul>
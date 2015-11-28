@extends('layouts.master')
@section('path')
    @parent > {{ Auth::user()->name }} ({{ Auth::user()->role }})
@endsection
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                @include('menu')
            </div>
            <div class="col-md-10">
                @yield('user_contenido')
            </div>
        </div>
    </div>
@endsection
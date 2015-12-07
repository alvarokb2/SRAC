@extends('layouts.master')
@section('path')
    @parent > @lang('navbar.home')
@endsection
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="jumbotron">
                            <h2>Información</h2>
                            <p>Informacion de la compañia.</p>
                            <p>
                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @include('partials.login')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
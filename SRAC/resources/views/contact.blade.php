@extends('layouts.master')
@section('path')
    @parent > @lang('navbar.contact')
@endsection
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="jumbotron">
                    <h2>Contacto</h2>
                    <p>
                        La forma de contactarse con la compa&ntilde;ia.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <address>
                    <strong>Twitter, Inc.</strong><br /> 795 Folsom Ave, Suite 600<br /> San Francisco, CA 94107<br /> <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.principal')

@section('navegador')
    @include('partials.nav')
@endsection


@section('contenido')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <br>
                <div class="jumbotron">
                    <h2>
                        Contacto
                    </h2>
                    <p>
                        Las formas de contactarte con nosotros son:
                        <br>
                        blabla
                        <br>
                        blablabla

                    </p>
                </div>
            </div>
            <div class="col-md-4">
            <br>
                <address>
                    <strong>Twitter, Inc.</strong><br /> 795 Folsom Ave, Suite 600<br /> San Francisco, CA 94107<br /> <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
            </div>
        </div>
    </div>
@endsection
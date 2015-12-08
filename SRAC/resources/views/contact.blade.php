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
                    <p>Formas de contactarse con nosotros</p>

                        <p>Dirección :José Joaquin Perez 6494 , Cerro Navia ,Santiago , Chile</p>
                        <p>Horario de atención : 9 a.m. a 12 p.m.</p>
                        <p>Correo :Lideinsenova@gmail.com</p>
                        <p>Teléfono :+5695656916</p>

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
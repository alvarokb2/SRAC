<div class="form-group">
    <img src="{{asset('assets/layoutPrincipal/css/imagenes/mapa.jpg')}}"/>
</div>
{!! Form::open(['route' => 'login.store', 'method' => 'POST']) !!}
<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, [
    'class'         => 'form-control',
    'placeholder'   => 'Nombre de usuario',
    'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Contrase&ntilde;a') !!}
    {!! Form::password('password', [
    'class'         => 'form-control',
    'placeholder'   => 'Contrase&ntilde;a',
    'required']) !!}
</div>
<div class="form-group">
    {!! Form::submit( 'Ingresar', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
<div class="alert alert-warning">
    <div class="form-group">
        <strong>Lo sentimos</strong> su cuenta se encuentra imposibilitada de hacer reservas
        debido a que tiene reservas pendientes.
    </div>
    <div class="form-group">
        <div class="btn btn-info btn-xs" data-toggle="collapse" data-target="#leermas">Leer mas</div>
    </div>
    <div id="leermas" class="collapse panel panel-info text-info">
        <div class="panel-heading">
            <strong>Informacion de Reservas Pendientes</strong>
        </div>
        <div class="panel-body">
            <p>Su cuenta no puede realizar mas reservas ya que existen reservaciones pendientes.
            </p>
            <p>
                Usted presenta una reserva pendiente el <strong>{{$fecha_pendiente->format('Y-m-d H:i')}}</strong>.
            </p>
        </div>
    </div>
</div>
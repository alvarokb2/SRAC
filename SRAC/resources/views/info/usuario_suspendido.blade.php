<div class="alert alert-danger">
    <div class="form-group">
        <strong>Lo sentimos</strong> su cuenta se encuentra imposibilitada de hacer reservas hasta el
        <strong>{{$fecha_habilitacion->format('Y-m-d H:i')}}</strong>
        debido a que tiene reservas perdidas.
    </div>
    <div class="form-group">
        <div class="btn btn-info btn-xs" data-toggle="collapse" data-target="#leermas">Leer mas</div>
    </div>
    <div id="leermas" class="collapse panel panel-info text-info">
        <div class="panel-heading">
            <strong>Informacion de Reservas Perdidas</strong>
        </div>
        <div class="panel-body">
            <p>Las reservas realizadas y perdidas sin presentar una justificaci&oacute;n prudente, generan
                una prohibici&oacute;n de realizar reservas por X d&iacute;as.
            </p>

            <p>
                Usted presenta una reserva perdida el
                <strong>{{$fecha_perdida->format('Y-m-d H:i')}}</strong>.
                Su cuenta se encontrar&aacute; habilitada desde el
                <strong>{{$fecha_habilitacion->format('Y-m-d H:i')}}</strong>.
            </p>
        </div>
    </div>
</div>
<div class="modal-dialog">
    <div class="modal-content">
        {!! Form::open(['route' => 'cliente.reservas.store', 'method' => 'POST']) !!}
        {!! Form::hidden('fecha_inicio', $fecha_inicio->getTimestamp()) !!}
        {!! Form::hidden('fecha_fin', $fecha_fin->getTimestamp()) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Confirmar Reserva</h3>
        </div>
        <div class="modal-body">
            <hr>
            <div class="form-group">
                {!! Form::label('Fecha de Inicio') !!}
                {!! Form::text('fecha_inicio_text', $fecha_inicio->format('Y-m-d H:i:s'), ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Fecha de Fin') !!}
                {!! Form::text('fecha_fin_text', $fecha_fin->format('Y-m-d H:i:s'), ['class' => 'form-control', 'disabled']) !!}
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit('Confirmar', ['class' => 'btn btn-primary']) !!}
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
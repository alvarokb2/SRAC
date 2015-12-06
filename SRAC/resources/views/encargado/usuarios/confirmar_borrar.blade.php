<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Confirmar</h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <p>&iquest; Desea borrar al usuario '{{$user->name}}' ?</p>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{route('empleado.usuarios.destroy', $user->id)}}"
               class="btn btn-primary">Borrar</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>
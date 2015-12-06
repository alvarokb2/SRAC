<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Confirmar</h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <p>&iquest; Desea borrar al noticia ({{$noticia->id}}) ?</p>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{route('empleado.admin.noticias.destroy', $noticia->id)}}" data-method="delete"
               class="btn btn-primary">Borrar</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>
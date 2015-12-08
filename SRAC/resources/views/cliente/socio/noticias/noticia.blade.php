<div class="panel panel-default">
    <div class="panel-heading">
        <div class="fecha">{{ $noticia->updated_at }}</div>
        <h4>
            <strong>{!! $noticia->titulo !!}</strong>
        </h4>
        <div class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#noticia_content_{{$noticia->id}}">Leer
        </div>
    </div>
    <div class="collapse panel-collapse" id="noticia_content_{{$noticia->id}}">
        <div class="panel-body">{!! $noticia->descripcion !!}</div>
    </div>
</div>
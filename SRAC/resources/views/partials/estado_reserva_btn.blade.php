@if(isset($estado))
    @if($estado == 'pendiente')
        <div class="btn btn-warning">{{$estado}}</div>
    @elseif($estado == 'completada')
        <div class="btn btn-success">{{$estado}}</div>
    @elseif($estado == 'perdida')
        <div class="btn btn-danger">{{$estado}}</div>
    @elseif($estado == 'cancelada')
        <div class="btn btn-danger">{{$estado}}</div>
    @else
        <div class="btn btn-default">{{$estado}}</div>
    @endif
@else
    variable $estado no definida
@endif
<!-- ['pendiente','completada', 'perdida', 'cancelada'] -->
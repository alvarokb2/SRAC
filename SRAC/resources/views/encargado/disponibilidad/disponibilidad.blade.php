@extends('layouts.principal')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <h3>Disponibilidad</h3>
            <div class="col-md-2">
               @include('encargado.partials.menu')
            </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Horario
                        </th>
                        <th>
                            {!! date("j-n")!!}
                        </th>
                        <th>
                            {!! date("j-n",time()+84600)!!}
                        </th>
                        <th>
                            {!! date("j-n",time()+(84600*2))!!}
                        </th>
                        <th>
                            {!! date("j-n",time()+(84600*3))!!}
                        </th>
                        <th>
                            {!! date("j-n",time()+(84600*4))!!}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($j = 0;$j <15;$j++)
                    <tr>
                        <td>{{($j + 9).':00'}}</td>
                        @for($i = 0; $i <5; $i++)
                                <td><a href="#" class="btn btn-success">Disponible</a></td>
                        @endfor
                    </tr>
                    @endfor

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

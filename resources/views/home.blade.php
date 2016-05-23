@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Trabajadores Activos</div>
                <div class="panel-body">
                    @if($workers->isEmpty())
                    <h1 class="text-center">No existe trabajadores registrados</h1>
                    @else
                        <table class="table table-hover">
                            <thead>
                            <tr >
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="success" style="text-align:center" colspan="3">Dias Vacaciones</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Celular</th>
                                <th>Fecha Entrada</th>
                                <th>Area</th>
                                <th>Puesto</th>
                                <th class="success">Ganados</th>
                                <th class="success">Tomados</th>
                                <th class="success">Restantes</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($workers as $worker)
                            <tr>
                                <td scope="row">{{$worker->id}}</td>
                                <td>{{$worker->name}}</td>
                                <td>{{$worker->cellphone}}</td>
                                <td>{{$worker->date_in}}</td>
                                <td>{{$worker->area->name}}</td>
                                <td>{{$worker->position}}</td>
                                <td class="success">{{$vacationDays=MyHelper::vacationDays($worker->date_in)}}</td>
                                <td class="success">{{$vacationTaken=MyHelper::vacationTaken($worker->id)}}</td>
                                <td class="success">{{$vacationDays-$vacationTaken}}</td>
                                <td>
                                    <!-- Single button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{ url('/worker/show/'.Crypt::encrypt($worker->id)) }}">Informacion de {{$worker->name}}</a></li>
                                            <li><a href="{{ url('/vacation/create/'.Crypt::encrypt($worker->id).'/'.Crypt::encrypt($worker->name)) }}">Asignar Vacaciones</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

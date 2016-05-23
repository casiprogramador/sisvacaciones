@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Trabajadores Activos</div>
                <div class="panel-body">
                    @if($workers->isEmpty())
                        <h1 class="text-center">No existe trabajadores retirados</h1>
                    @else
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Celular</th>
                                <th>Puesto</th>
                                <th>Fecha Entrada</th>
                                <th>Fecha Retiro</th>
                                <th>Motivo de Retiro</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($workers as $worker)
                            <tr>
                                <td scope="row">{{$worker->id}}</td>
                                <td>{{$worker->name}}</td>
                                <td>{{$worker->cellphone}}</td>
                                <td>{{$worker->position}}</td>
                                <td>{{$worker->date_in}}</td>
                                <td>{{$worker->date_out}}</td>
                                <td>{{$worker->reason_retirement}}</td>
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

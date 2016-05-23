@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">Datos del Trabajador</h3>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ url('/worker/edit/'.Crypt::encrypt($worker->id)) }}">Editar Datos</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modalWorker">Retirar Trabajador</a></li>
                            </ul>
                        </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <p href="#" class="thumbnail">
                            <img src="{{$worker->photo}}" alt=""/>
                        </p>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Estado:</b></p>
                            </div>
                            <div class="col-md-9">
                                <p>{{ MyHelper::stateWorker($worker->state)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Nombre:</b></p>
                            </div>
                            <div class="col-md-9">
                                <p>{{$worker->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>CI:</b></p>
                            </div>
                            <div class="col-md-9">
                                <p>{{$worker->ci}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Celular:</b></p>
                            </div>
                            <div class="col-md-9">
                                <p>{{$worker->cellphone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Email:</b></p>
                            </div>
                            <div class="col-md-9">
                                <p>{{$worker->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Fecha Ingreso:</b></p>
                            </div>
                            <div class="col-md-9">
                                <p>{{$worker->date_in}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Puesto:</b></p>
                            </div>
                            <div class="col-md-9">
                                <p>{{$worker->position}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><b>Area:</b></p>
                            </div>
                            <div class="col-md-9">
                                <p>{{$worker->area->name}}</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Vacaciones</h3>

                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Fecha Inicio</th>
                            <th>Nro Dias</th>
                            <th>Motivo</th>
                            <th>Observacion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($worker->vacations as $vacation)
                        @if($vacation->type == 'vacacion')
                        <tr>
                            <th scope="row">{{date("d/m/Y", strtotime($vacation->created_at))}}</th>
                            <td>{{$vacation->days_taken}}</td>
                            <td>{{$vacation->reason}}</td>
                            <td>{{$vacation->observations}}</td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Permisos</h3>

                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Fecha Inicio</th>
                            <th>Nro Dias</th>
                            <th>Motivo</th>
                            <th>Observacion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($worker->vacations as $vacation)
                        @if($vacation->type == 'permiso')
                        <tr>
                            <th scope="row">{{date("d/m/Y", strtotime($vacation->created_at))}}</th>
                            <td>{{$vacation->days_taken}}</td>
                            <td>{{$vacation->reason}}</td>
                            <td>{{$vacation->observations}}</td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Faltas</h3>

                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Fecha Inicio</th>
                            <th>Nro Dias</th>
                            <th>Motivo</th>
                            <th>Observacion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($worker->vacations as $vacation)
                        @if($vacation->type == 'falta')
                        <tr>
                            <th scope="row">{{date("d/m/Y", strtotime($vacation->created_at))}}</th>
                            <td>{{$vacation->days_taken}}</td>
                            <td>{{$vacation->reason}}</td>
                            <td>{{$vacation->observations}}</td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modalWorker">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Retirar Trabajador</h4>
            </div>
            <form role="form" method="POST" action="{{ url('/worker/remove') }}">
                {!! csrf_field() !!}
            <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Fecha de Retiro:</label>
                        <input type="text" class="form-control" id="date-out" name="fecha_retiro">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Motivo de Retiro:</label>
                        <textarea class="form-control" id="message-text" name="motivo_retiro"></textarea>
                    </div>
                    <input type="hidden" name="id_worker" value="{{$worker->id}}"/>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Retirar Trabajador</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('javascript')
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/bootstrap-datetimepicker.min.js') !!}
<script type="text/javascript">
    $('#date-out').datetimepicker({
        format: 'DD-MM-YYYY'
    });
</script>
@endsection
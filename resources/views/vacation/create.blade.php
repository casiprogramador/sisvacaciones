@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar vacacion a {{$name_worker}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/vacation/store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tipo:</label>

                            <div class="col-md-6">
                                {!! Form::select('type',['' => 'Seleccione un tipo...','vacacion' => 'Vacacion','falta' => 'Falta','permiso' => 'Permiso'],null, array('class' => 'form-control')) !!}

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Razon:</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="reason" rows="5" id="reason" value="{{ old('reason') }}"></textarea>
                                @if ($errors->has('reason'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reason') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('days_taken') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Dias Tomados:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="days_taken" value="{{ old('days_taken') }}">

                                @if ($errors->has('days_taken'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('days_taken') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_init') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Fecha de Inicio:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="date-init" name="date_init" value="{{ old('date_init') }}">

                                @if ($errors->has('date_init'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_init') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('observations') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Observations:</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="observations" rows="5" id="observations" value="{{ old('observations') }}"></textarea>
                                @if ($errors->has('observations'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observations') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="worker_id" value="{{$id_worker}}"/>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Vacacion
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
{!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
@endsection
@section('javascript')
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/bootstrap-datetimepicker.min.js') !!}
<script>
    $('#date-init').datetimepicker({
        format: 'DD-MM-YYYY'
    });
</script>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Empleado</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">CI:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ci" value="{{ old('ci') }}">

                                @if ($errors->has('ci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ext_ci') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Extencion:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ci" value="{{ old('ext_ci') }}">

                                @if ($errors->has('ext_ci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ext_ci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Numero Celular:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cellphone" value="{{ old('cellphone') }}">

                                @if ($errors->has('cellphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_in') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Fecha de Ingreso:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="date_in" value="{{ old('date_in') }}">

                                @if ($errors->has('date_in'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cargo:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="position" value="{{ old('position') }}">

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Nuevo Empleado
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

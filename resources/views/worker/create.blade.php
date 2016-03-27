@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Empleado</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            {!! Form::open(['route'=> 'worker.upload', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                            <div class="dz-message">
                                Seleccione la fotografia del Empleado
                            </div>
                            <div class="dropzone-previews" style="text-align: center"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/worker/store') }}">
                            {!! csrf_field() !!}
                            <div class="col-md-6 col-md-offset-4 {{ $errors->has('photo') ? ' has-error' : '' }}">
                                <input type="hidden" id="path-photo" name="photo" value=""/>
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ci') ? ' has-error' : '' }}">
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

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Email:</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date_in') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Fecha de Ingreso:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="date-in" name="date_in" value="{{ old('date_in') }}">

                                    @if ($errors->has('date_in'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_in') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Area:</label>

                                <div class="col-md-6">
                                    {!! Form::select('area_id',['' => 'Seleccione un area...']+$areas,null, array('class' => 'form-control')) !!}

                                    @if ($errors->has('area_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area_id') }}</strong>
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
</div>
@endsection
@section('style')
{!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
{!! Html::style('css/dropzone.min.css') !!}
<style>
    .dropzone .dz-preview{
        margin: 10px;
        min-height: 150px;
    }
    .dropzone .dz-preview .dz-image{
        width: 150px;
        height: 150px;
    }
    .dz-image img{
        width: 150px;
        height: 150px;
    }

</style>
@endsection
@section('javascript')
{!! Html::script('js/moment.min.js') !!}
{!! Html::script('js/bootstrap-datetimepicker.min.js') !!}
{!! Html::script('js/dropzone.min.js') !!}
<script type="text/javascript">
    $(function () {
        $('#date-in').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        Dropzone.options.myDropzone = {
            uploadMultiple: false,
            // previewTemplate: '',
            addRemoveLinks: false,
            maxFiles: 1,
            dictDefaultMessage: '',
            init: function() {
                this.on("addedfile", function(file) {
                    // console.log('addedfile...');
                });
                this.on("thumbnail", function(file, dataUrl) {
                    // console.log('thumbnail...');
                    $('.dz-image-preview').hide();
                    $('.dz-file-preview').hide();
                });
                this.on("success", function(file, res) {
                    console.log('upload success...');
                    $('#path-photo').attr('value', res.path);
                    $('input[name="pic_url"]').val(res.path);
                    console.log(res.path);
                });
            }
        };
        var myDropzone = new Dropzone("#my-dropzone");

        $('#upload-submit').on('click', function(e) {
            e.preventDefault();
            //trigger file upload select
            $("#my-dropzone").trigger('click');
        });
    });
</script>
@endsection
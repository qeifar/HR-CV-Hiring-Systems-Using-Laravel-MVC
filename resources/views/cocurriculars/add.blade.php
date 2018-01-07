{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')
@section('content')


<h2 class="page-header">Cocurricular</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Cocurricular    </div>

    <div class="panel-body">
                
        <form action="{{ url('/cocurriculars'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


                                    <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
                </div>
            </div>
                                                                                                                        <div class="form-group">
                <label for="appointedID" class="col-sm-3 control-label">AppointedID</label>
                <div class="col-sm-2">
                    <input type="number" name="appointedID" id="appointedID" class="form-control" value="{{$model['appointedID'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="educationId" class="col-sm-3 control-label">EducationId</label>
                <div class="col-sm-2">
                    <input type="number" name="educationId" id="educationId" class="form-control" value="{{$model['educationId'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="position" class="col-sm-3 control-label">Position</label>
                <div class="col-sm-6">
                    <input type="text" name="position" id="position" class="form-control" value="{{$model['position'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="association" class="col-sm-3 control-label">Association</label>
                <div class="col-sm-6">
                    <input type="text" name="association" id="association" class="form-control" value="{{$model['association'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="achievement" class="col-sm-3 control-label">Achievement</label>
                <div class="col-sm-6">
                    <input type="text" name="achievement" id="achievement" class="form-control" value="{{$model['achievement'] or ''}}">
                </div>
            </div>
                                                            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/cocurriculars') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection
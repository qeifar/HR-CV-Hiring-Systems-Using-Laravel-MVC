{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')

@section('content')


<h2 class="page-header">Appointed_position</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Appointed_position    </div>

    <div class="panel-body">
                
        <form action="{{ url('/appointed_positions'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
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
                <label for="session" class="col-sm-3 control-label">Session</label>
                <div class="col-sm-6">
                    <input type="text" name="session" id="session" class="form-control" value="{{$model['session'] or ''}}">
                </div>
            </div>
                                                            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/appointed_positions') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection
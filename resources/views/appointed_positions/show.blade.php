{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')

@section('content')



<h2 class="page-header">Appointed_position</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Appointed_position    </div>

    <div class="panel-body">
                

        <form action="{{ url('/appointed_positions') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="position" class="col-sm-3 control-label">Position</label>
            <div class="col-sm-6">
                <input type="text" name="position" id="position" class="form-control" value="{{$model['position'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="association" class="col-sm-3 control-label">Association</label>
            <div class="col-sm-6">
                <input type="text" name="association" id="association" class="form-control" value="{{$model['association'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="session" class="col-sm-3 control-label">Session</label>
            <div class="col-sm-6">
                <input type="text" name="session" id="session" class="form-control" value="{{$model['session'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/appointed_positions') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection
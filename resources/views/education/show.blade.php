{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')
@section('content')



<h2 class="page-header">Education</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Education    </div>

    <div class="panel-body">
                

        <form action="{{ url('/education') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="year_start" class="col-sm-3 control-label">Year Start</label>
            <div class="col-sm-6">
                <input type="text" name="year_start" id="year_start" class="form-control" value="{{$model['year_start'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="year_end" class="col-sm-3 control-label">Year End</label>
            <div class="col-sm-6">
                <input type="text" name="year_end" id="year_end" class="form-control" value="{{$model['year_end'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="edu_level" class="col-sm-3 control-label">Edu Level</label>
            <div class="col-sm-6">
                <input type="text" name="edu_level" id="edu_level" class="form-control" value="{{$model['edu_level'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="edu_institute" class="col-sm-3 control-label">Edu Institute</label>
            <div class="col-sm-6">
                <input type="text" name="edu_institute" id="edu_institute" class="form-control" value="{{$model['edu_institute'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="edu_result" class="col-sm-3 control-label">Edu Result</label>
            <div class="col-sm-6">
                <input type="text" name="edu_result" id="edu_result" class="form-control" value="{{$model['edu_result'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="person_id" class="col-sm-3 control-label">Person Id</label>
            <div class="col-sm-6">
                <input type="text" name="person_id" id="person_id" class="form-control" value="{{$model['person_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/education') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection
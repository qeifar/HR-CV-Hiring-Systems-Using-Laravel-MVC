@extends('backpack::layout')

@section('content')



<h2 class="page-header">Strength</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Strength    </div>

    <div class="panel-body">
                

        <form action="{{ url('/strengths') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="strength_description" class="col-sm-3 control-label">Strength Description</label>
            <div class="col-sm-6">
                <input type="text" name="strength_description" id="strength_description" class="form-control" value="{{$model['strength_description'] or ''}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/strengths') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection
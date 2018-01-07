{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')

@section('content')



<h2 class="page-header">Rujukan</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Rujukan    </div>

    <div class="panel-body">
                

        <form action="{{ url('/rujukans') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="references_name" class="col-sm-3 control-label">References Name</label>
            <div class="col-sm-6">
                <input type="text" name="references_name" id="references_name" class="form-control" value="{{$model['references_name'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="references_contact" class="col-sm-3 control-label">References Contact</label>
            <div class="col-sm-6">
                <input type="text" name="references_contact" id="references_contact" class="form-control" value="{{$model['references_contact'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="references_detail" class="col-sm-3 control-label">References Detail</label>
            <div class="col-sm-6">
                <input type="text" name="references_detail" id="references_detail" class="form-control" value="{{$model['references_detail'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/rujukans') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection
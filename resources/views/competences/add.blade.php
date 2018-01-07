{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')

@section('content')


<h2 class="page-header">Competence</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Competence    </div>

    <div class="panel-body">
                
        <form action="{{ url('/competences'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
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
                <label for="person_id" class="col-sm-3 control-label">Person Id</label>
                <div class="col-sm-2">
                    <input type="number" name="person_id" id="person_id" class="form-control" value="{{$model['person_id'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="referenceID" class="col-sm-3 control-label">ReferenceID</label>
                <div class="col-sm-2">
                    <input type="number" name="referenceID" id="referenceID" class="form-control" value="{{$model['referenceID'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="competence_area" class="col-sm-3 control-label">Competence Area</label>
                <div class="col-sm-6">
                    <input type="text" name="competence_area" id="competence_area" class="form-control" value="{{$model['competence_area'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="competence_description" class="col-sm-3 control-label">Competence Description</label>
                <div class="col-sm-6">
                    <input type="text" name="competence_description" id="competence_description" class="form-control" value="{{$model['competence_description'] or ''}}">
                </div>
            </div>
                                                            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/competences') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection
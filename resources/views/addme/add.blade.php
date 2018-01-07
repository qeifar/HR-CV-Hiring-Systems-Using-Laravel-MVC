{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')

@section('content')


<h2 class="page-header">Add Me!</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Person    </div>

    <div class="panel-body">
                
        <form action="{{ url('/people'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
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
                <label for="person_name" class="col-sm-3 control-label">Person Name</label>
                <div class="col-sm-6">
                    <input type="text" name="person_name" id="person_name" class="form-control" value="{{$model['person_name'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="person_address" class="col-sm-3 control-label">Person Address</label>
                <div class="col-sm-6">
                    <input type="text" name="person_address" id="person_address" class="form-control" value="{{$model['person_address'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="person_email" class="col-sm-3 control-label">Person Email</label>
                <div class="col-sm-6">
                    <input type="text" name="person_email" id="person_email" class="form-control" value="{{$model['person_email'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="person_contact" class="col-sm-3 control-label">Person Contact</label>
                <div class="col-sm-2">
                    <input type="number" name="person_contact" id="person_contact" class="form-control" value="{{$model['person_contact'] or ''}}">
                </div>
            </div>
                                                                                                                        <div class="form-group">
                <label for="objective" class="col-sm-3 control-label">Objective</label>
                <div class="col-sm-6">
                    <input type="text" name="objective" id="objective" class="form-control" value="{{$model['objective'] or ''}}">
                </div>
            </div>
                                                                        <div class="form-group">
                <label for="age" class="col-sm-3 control-label">Age</label>
                <div class="col-sm-2">
                    <input type="number" name="age" id="age" class="form-control" value="{{$model['age'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="date_of_birth" class="col-sm-3 control-label">Date Of Birth</label>
                <div class="col-sm-6">
                    <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" value="{{$model['date_of_birth'] or ''}}">
                </div>
            </div>
                                                                                                                                    <div class="form-group">
                <label for="place_of_birth" class="col-sm-3 control-label">Place Of Birth</label>
                <div class="col-sm-6">
                    <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="{{$model['place_of_birth'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="nationality" class="col-sm-3 control-label">Nationality</label>
                <div class="col-sm-6">
                    <input type="text" name="nationality" id="nationality" class="form-control" value="{{$model['nationality'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="gender" class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-6">
                    <input type="text" name="gender" id="gender" class="form-control" value="{{$model['gender'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="marital_status" class="col-sm-3 control-label">Marital Status</label>
                <div class="col-sm-6">
                    <input type="text" name="marital_status" id="marital_status" class="form-control" value="{{$model['marital_status'] or ''}}">
                </div>
            </div>
                        
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/addme') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection
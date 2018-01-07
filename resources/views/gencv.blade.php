@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Generate Your CV<small>Good Luck !</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>
               <div class="box-body">{{ trans('backpack::base.logged_in') }}
                   <div class="row">
               <div class="container col-sx-12">
                <div class="row "><br><br><br><br>
                   <div class="row">
                <a href="{{ url('/cv/'.$person->id.' ') }}"><button type="button" class="btn btn-primary btn-lg">
                    Generate your CV</button></a>
                    </div>

                </div>
                </div>
                <div class="row "><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
                </div>
            </div>
        </div>
    </div>
@endsection

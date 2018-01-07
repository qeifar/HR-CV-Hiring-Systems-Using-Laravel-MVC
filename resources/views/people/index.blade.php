{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')

@section('content')


<h2 class="page-header">{{ ucfirst('people') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('people') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Person Name</th>
                                        <th>Person Address</th>
                                        <th>Person Email</th>
                                        <th>Person Contact</th>
                                        <th>Objective</th>
                                        <th>Age</th>
                                        <th>Date Of Birth</th>
                                        <th>Place Of Birth</th>
                                        <th>Nationality</th>
                                        <th>Gender</th>
                                        <th>Marital Status</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        {{--<a href="{{url('people/create')}}" class="btn btn-primary" role="button">Add person</a>--}}
    </div>
</div>




@endsection



@section('scripts')
    <script type="text/javascript">
        var theGrid = null;
        $(document).ready(function(){
            theGrid = $('#thegrid').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "responsive": true,
                "ajax": "{{url('people/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/people') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/people') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 12                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 12+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/people') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection
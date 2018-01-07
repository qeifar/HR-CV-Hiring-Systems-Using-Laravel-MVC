{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')

@section('content')


<h2 class="page-header">{{ ucfirst('education') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('education') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Year Start</th>
                                        <th>Year End</th>
                                        <th>Edu Level</th>
                                        <th>Edu Institute</th>
                                        <th>Edu Result</th>
                                        <th>Person Id</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <a href="{{url('education/create')}}" class="btn btn-primary" role="button">Add education</a>
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
                "ajax": "{{url('education/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/education') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/education') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 7                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 7+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/education') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection
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
           
        </div>
        <a href="{{url('addme/create')}}" class="btn btn-primary" role="button">Add person</a>
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
                "ajax": "{{url('addme/grid')}}",
                "columnDefs": [
                    {/*
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
                    */},
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
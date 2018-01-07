{{--@extends('crudgenerator::layouts.master')
--}}
@extends('backpack::layout')

@section('content')


<h2 class="page-header">{{ ucfirst('rujukans') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('rujukans') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>References Name</th>
                                        <th>References Contact</th>
                                        <th>References Detail</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <a href="{{url('rujukans/create')}}" class="btn btn-primary" role="button">Add rujukan</a>
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
                "ajax": "{{url('rujukans/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/rujukans') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/rujukans') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 4                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 4+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/rujukans') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection
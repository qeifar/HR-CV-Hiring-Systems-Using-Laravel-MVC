{{--@extends('carian.master')
--}}
@extends('backpack::layout')

@section('content')


<h2 class="page-header">Candidates List by Skills</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of Candidates
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Person Name</th>
                                        <th>Skills</th>
                                        <th>Edu Level</th>
                                        <th>Result</th>
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
                "ajax": "{{url('carian/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/carian') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
            
                ]
            });
        });
        {{--
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/carian') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
        --}}
    </script>
@endsection
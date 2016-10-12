@extends('layouts.master')

@section('title', 'DTMA- Deleted Hospital')


@section('stylesheets')

    <style type="text/css">
        .dt-disable{
            pointer-events:none;
            cursor: not-allowed;
            filter: alpha(opacity=65);
            -webkit-box-shadow: none;
            box-shadow: none;
            opacity: .65;
        }
    </style>

    <!-- DataTables CSS -->
    <link href="{{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">

@stop


@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">RESTORE Hospital Information</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Hospital Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                {!! Form::open(['route' => 'hospital.selected.restore']) !!}  
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <td>Select</td>
                                            <th>#ID</th>
                                            <th>Hospital Name</th>
                                            <th>Location</th>
                                            <th>Area</th>
                                            <th>City</th>
                                            <th>Contact Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hospitals as $hospital)
                                            <tr class="odd gradeX">
                                                <td>
                                                    {{Form::checkbox('checkItem[]', $hospital->id, null)}}
                                                </td>
                                                <th>{{ $hospital->id }}</th>
                                                <td>{{ $hospital->hospital_name }}</td>
                                                <td>{{ $hospital->hos_location }}</td>
                                                <td>{{ $hospital->area }}</td>
                                                <td>{{ $hospital->city }}</td>
                                                <td>{{ $hospital->contact }}</td>
                                                <td><a href="{{ route('hospital.restore', $hospital->id) }}">Restore</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <button id="restore" class="btn btn-success dt-disable">
                                    Restore Data
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

@stop

@section('scripts')

    <!-- DataTables JavaScript -->
    <script src="{{ URL::asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('bower_components/datatables-responsive/js/dataTables.responsive.js') }}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });

        var checkboxes = $("input[type='checkbox']"),
            restoreButton = $("#restore");
            
            checkboxes.click(function() {
                if(checkboxes.is(":checked")){
                    restoreButton.removeClass(
                        "dt-disable" 
                    ); 
                }
                else{
                    restoreButton.addClass(
                        "dt-disable" 
                    ); 
                }
            });
        });
    </script>    

@stop

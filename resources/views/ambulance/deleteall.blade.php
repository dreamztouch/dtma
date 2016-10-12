@extends('layouts.master')

@section('title', 'DTMA- Delete Ambulance')


@section('stylesheets')

    <!-- DataTables CSS -->
    <link href="{{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">

@stop


@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">DELETE Ambulance Information</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ambulance Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                {!! Form::open(['route' => ['ambulance.selected.delete'], 'method' => 'DELETE']) !!}
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>#ID</th>
                                            <th>Orgainzation Name</th>
                                            <th>Contact Number</th>
                                            <th>Area</th>
                                            <th>City</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ambulances as $ambulance)
                                            <tr class="odd gradeX">
                                                <td>
                                                    {{Form::checkbox('checkItem[]', $ambulance->id, null)}}
                                                </td>
                                                <th>{{ $ambulance->id }}</th>
                                                <td>{{ $ambulance->organization_name }}</td>
                                                <td>{{ $ambulance->contact }}</td>
                                                <td>{{ $ambulance->area }}</td>
                                                <td>{{ $ambulance->city }}</td>
                                                <td><a href="{{ route('ambulance.delete', $ambulance->id) }}">Delete</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a id="trash" class="btn btn-warning disabled" data-toggle="modal" data-target="#trashAmbulance">
                                    Move to Trash
                                </a>

                                <a id="delete" class="btn btn-danger disabled" data-toggle="modal" data-target="#deleteAmbulance">
                                    Delete Permanently
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="trashAmbulance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Delete</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    Are you sure? you want to trash this data. 
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::submit('Yes',["class" => "btn btn-danger",
                                                "name" => "trash"]) !!}

                                                <a data-dismiss="modal" class="btn btn-success">NO</a>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <!-- Modal -->
                                <div class="modal fade" id="deleteAmbulance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Delete</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    Are you sure? you want to delete this data. 
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::submit('Yes',["class" => "btn btn-danger",
                                                "name" => "delete"]) !!}

                                                <a data-dismiss="modal" class="btn btn-success">NO</a>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
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
            trashButton = $("#trash");
            deleteButton = $("#delete");
            
            checkboxes.click(function() {
                if(checkboxes.is(":checked")){
                    trashButton.removeClass(
                        "disabled" 
                    );
                    deleteButton.removeClass(
                        "disabled" 
                    ); 
                }
                else{
                    trashButton.addClass(
                        "disabled" 
                    );
                    deleteButton.addClass(
                        "disabled" 
                    ); 
                }
            });
        });
    </script>    

@stop

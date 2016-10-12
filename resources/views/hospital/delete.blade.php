@extends('layouts.master')

@section('title', 'DTMA- Delete Hospital')

@section('content')

			<div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">{{ $hospital->hospital_name }}</h2>
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
                            <p><strong>#ID:</strong> {{ $hospital->id }}</p>
                            <p><strong>Hospital's Name:</strong> {{ $hospital->hospital_name }}</p>
                            <p><strong>Hospital's Category:</strong> {{ $hospital->category }}</p>
                            <p><strong>Hopital's Speciality:</strong> {{ $hospital->hos_speciality }}</p>
                            <p><strong>Address:</strong> {{ $hospital->hos_location }}</p>
                            <p><strong>Area:</strong> {{ $hospital->area }}</p>
                            <p><strong>City:</strong> {{ $hospital->city }}</p>
                            <p><strong>Contact:</strong> {{ $hospital->contact }}</p>

                            <button class="btn btn-warning" data-toggle="modal" data-target="#trashHospital">
                                Move to Trash
                            </button>

                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteHospital">
                                Delete Permanently
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="trashHospital" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Trash
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">
                                                Are you sure? you want to trash this data. 
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <!--<button type="button" class="btn btn-success" data-dismiss="modal">NO</button>-->
                                            

                                            {!! Form::open(['route' => ['hospital.destroy', $hospital->id], 'method' => 'DELETE']) !!}
    
                                                {!! Form::submit('YES',["class" => "btn btn-danger",
                                                "name" => "trash"]) !!}

                                                <a data-dismiss="modal" class="btn btn-success">NO</a>
                                            
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                            <!-- Modal -->
                            <div class="modal fade" id="deleteHospital" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            <!--<button type="button" class="btn btn-success" data-dismiss="modal">NO</button>-->
                                            

                                            {!! Form::open(['route' => ['hospital.destroy', $hospital->id], 'method' => 'DELETE']) !!}
    
                                                {!! Form::submit('YES',["class" => "btn btn-danger",
                                                "name" => "delete"]) !!}

                                                <a data-dismiss="modal" class="btn btn-success">NO</a>
                                            
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

@stop
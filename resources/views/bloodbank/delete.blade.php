@extends('layouts.master')

@section('title', 'DTMA- Delete Blood Bank')

@section('content')

			<div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">{{ $bloodbank->bloodbank_name }}</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Blood Bank Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <p><strong>#ID:</strong> {{ $bloodbank->id }}</p>
                            <p><strong>Blood Bank Name:</strong> {{ $bloodbank->bloodbank_name }}</p>
                            <p><strong>Address:</strong> {{ $bloodbank->location }}</p>
                            <p><strong>Contact:</strong> {{ $bloodbank->contact }}</p>
                            <p><strong>Area:</strong> {{ $bloodbank->area }}</p>
                            <p><strong>City:</strong> {{ $bloodbank->city }}</p>
                            <p><strong>Email:</strong> {{ $bloodbank->bloodbank_email }}</p>
                            <p><strong>Web:</strong> {{ $bloodbank->bloodbank_web }}</p>

                            <button class="btn btn-warning" data-toggle="modal" data-target="#trashBloodbank">
                                Move to Trash
                            </button>

                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteBloodbank">
                                Delete Permanently
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="trashBloodbank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            <!--<button type="button" class="btn btn-success" data-dismiss="modal">NO</button>-->
                                            

                                            {!! Form::open(['route' => ['bloodbank.destroy', $bloodbank->id], 'method' => 'DELETE']) !!}
    
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
                            <div class="modal fade" id="deleteBloodbank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            

                                            {!! Form::open(['route' => ['bloodbank.destroy', $bloodbank->id], 'method' => 'DELETE']) !!}
    
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
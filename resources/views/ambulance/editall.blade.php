@extends('layouts.master')

@section('title', 'DTMA- Edit Ambulance')


@section('stylesheets')

	<!-- DataTables CSS -->
	<link href="{{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
    <link href="{{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">

@stop


@section('content')

			<div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">EDIT Ambulance Information</h2>
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
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
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
												<th>{{ $ambulance->id }}</th>
												<td>{{ $ambulance->organization_name }}</td>
												<td>{{ $ambulance->contact }}</td>
												<td>{{ $ambulance->area }}</td>
												<td>{{ $ambulance->city }}</td>
												<td><a href="{{ route('ambulance.edit', $ambulance->id) }}">Edit</a></td>
											</tr>
										@endforeach
                                    </tbody>
                                </table>
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
    });
    </script>    

@stop

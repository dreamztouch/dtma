@extends('layouts.master')

@section('title', 'DTMA- Edit Blood Bank')


@section('stylesheets')

	<!-- DataTables CSS -->
	<link href="{{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
    <link href="{{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">

@stop


@section('content')

			<div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">EDIT Blood Bank Information</h2>
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
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Orgainzation Name</th>
                                            <th>Location</th>
                                            <th>Area</th>
                                            <th>City</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach ($bloodbanks as $bloodbank)
											<tr class="odd gradeX">
												<th>{{ $bloodbank->id }}</th>
												<td>{{ $bloodbank->bloodbank_name }}</td>
												<td>{{ $bloodbank->location }}</td>
												<td>{{ $bloodbank->area }}</td>
												<td>{{ $bloodbank->city }}</td>
												<td>{{ $bloodbank->contact }}</td>
												<td>{{ $bloodbank->bloodbank_email }}</td>
												<td>{{ $bloodbank->bloodbank_web }}</td>
												<td><a href="{{ route('bloodbank.edit', $bloodbank->id) }}">Edit</a></td>
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

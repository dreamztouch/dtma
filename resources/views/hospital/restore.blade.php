@extends('layouts.master')

@section('title', 'DTMA- Restore Hospital')



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
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

@stop

@if (Session::has('success'))

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Success</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @section('scripts')
        <script type="text/javascript">
            $('#myModal').modal('show')  
        </script>  
    @stop

@endif
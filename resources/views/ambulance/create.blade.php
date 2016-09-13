@extends('layouts.master')

@section('title', 'DTMA- Add Ambulance')

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">ADD Ambulance Information</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ambulance Information Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                	<div class="alert alert-info">
                                        * Sign means mendatory field
                                    </div>

									{!! Form::open(['route' => 'ambulance.store']) !!}

										<div class="form-group">
                                            {{ Form::label("oraganization name","Organization's Name ") }}<strong class="text-danger">*</strong>
                                            {{ Form::text("organization_name", null, ["class" => "form-control", "placeholder" => "Enter text"]) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("Contact Number","Contact Number ") }}
                                        	{{ Form::text("contact", null, ["class" => "form-control", "placeholder" => "Enter Number"]) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("Area Name","Enter Area Name ") }}<strong class="text-danger">*</strong>
                                        	{{ Form::text("area", null, ["class" => "form-control", "placeholder" => "Enter text"]) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("City Name","Select City ") }}
                                            {{ Form::select('city', [
											   'Dhaka' => 'Dhaka',
											   'Chittagong' => 'Chittagong',
											   'Khulna' => 'Khulna',
											   'Shylet' => 'Shylet',
											   'Barisal' => 'Barisal'], null, ['class' => 'form-control']
											) }}
                                        </div>

                                        {{ Form::submit('ADD Ambulance', ['class' => 'btn btn-primary']) }}

									{!! Form::close() !!}

                                </div>

                                <div class="col-lg-6">
                                    @include('common.error')
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

@stop
@extends('layouts.master')

@section('title', 'DTMA- Add Hospital')

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">ADD Hospital Information</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Hospital Information Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="alert alert-info">
                                        * Sign means mendatory field
                                    </div>
                                	{!! Form::open(['route' => 'hospital.store']) !!}

                                		<div class="form-group">
                                            {{ Form::label("hospital name","Hospital's Name ") }}<strong class="text-danger">*</strong>
                                            {{ Form::text("hospital_name", null, ["class" => "form-control", "placeholder" => "Enter text"]) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("hospital category","Hospital's Category ") }}
                                            
                                            {{ Form::select('category', [
                                               'All' => 'All',
											   'General Hospital- Government' => 'General Hospital- Government',
											   'General Hospital' => 'General Hospital',
											   'Cancer Hospital' => 'Cancer Hospital',
											   'Clinic' => 'Clinic'], null, ['class' => 'form-control']
											) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("speciality","Hospital's Speciality ") }}
                                        	{{ Form::textarea('hos_speciality', null, ['class' => 'form-control', 'size' => '30x3']) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("address","Address ") }}<strong class="text-danger">*</strong>
                                        	{{ Form::textarea('hos_location', null, ['class' => 'form-control', 'size' => '30x3']) }}
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
                                        <div class="form-group">
                                        	{{ Form::label("Contact Number","Contact Number ") }}
                                        	{{ Form::text("contact", null, ["class" => "form-control", "placeholder" => "Enter Number"]) }}
                                        </div>
                                        {{ Form::submit('ADD Hospital', ['class' => 'btn btn-primary']) }}

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
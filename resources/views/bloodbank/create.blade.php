@extends('layouts.master')

@section('title', 'DTMA- Add Blood Bank')

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">ADD Blood Bank Information</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Blood Bank Information Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                	{!! Form::open() !!}

                                		<div class="form-group">
                                            {{ Form::label("oraganization name","Organization's Name: ") }}
                                            {{ Form::text("organizationName", null, ["class" => "form-control", "placeholder" => "Enter text"]) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("address","address: ") }}
                                        	{{ Form::textarea('address', null, ['class' => 'form-control', 'size' => '30x3']) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("Area Name","Enter Area Name: ") }}
                                        	{{ Form::text("areaName", null, ["class" => "form-control", "placeholder" => "Enter text"]) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("City Name","Select City: ") }}
                                            
                                            {{ Form::select('city', [
											   'DHK' => 'Dhaka',
											   'CTG' => 'Chittagong',
											   'KHU' => 'Khulna',
											   'SHY' => 'Shylet',
											   'BAR' => 'Barisal'], null, ['class' => 'form-control']
											) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("Contact Number","Contact Number: ") }}
                                        	{{ Form::text("contactNumber", null, ["class" => "form-control", "placeholder" => "Enter Number"]) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("Email","Email: ") }}
                                            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter E-mail']) }}
                                        </div>
                                        <div class="form-group">
                                        	{{ Form::label("Website","Website: ") }}
                                            {{ Form::text("website", null, ["class" => "form-control", "placeholder" => "Enter Website"]) }}
                                        </div>
                                        {{ Form::submit('ADD Blood Bank', ['class' => 'btn btn-primary']) }}

                                	{!! Form::close() !!}
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
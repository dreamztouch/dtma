@extends('layouts.master')

@section('title', 'DTMA- Add Doctor')

@section('stylesheets')

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/custom-style.css') }}" rel="stylesheet">

@stop

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">ADD Doctor's Information</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Doctor Information Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="alert alert-info">
                                        * Sign means mendatory field
                                    </div>
                                	
                                    <form method="post" action="{{ route('doctor.store') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label>Doctor's Name</label><strong class="text-danger">*</strong>
                                            <input name="doctor_name" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Qualification</label><strong class="text-danger">*</strong>
                                            <textarea name="doctor_qualification" class="form-control" rows="3" placeholder="Enter qualifications separated by comma (,) EX: MBBS, FCPS"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Designation</label><strong class="text-danger">*</strong>
                                            <input name="doctor_designation" class="form-control" placeholder="Enter text">
                                        </div>

                                        <div class="form-group">
                                            <label>Expertise</label>
                                            <select name="doctor_expertise" class="form-control">
                                                <option>Medicine</option>
                                                <option>Medicine & Cardiology</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Visiting Hospital</label><strong class="text-danger">*</strong>
                                            <select name="visiting_hospital" class="form-control">
                                                @foreach($hospitals as $id => $hospital)
                                                    <option value={{$id}}>{{$hospital}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" ng-app="angularjs-starter" ng-controller="MainCtrl">

                                            <fieldset  data-ng-repeat="choice in choices">
                                                <label>Visiting Hospital Options</label><strong class="text-danger">*</strong>

                                                <select name="visiting_hospital_option[]" class="custom-form-control">

                                                    @foreach($hospitals as $id => $hospital)
                                                        <option value={{$id}} ng-model="choice.name">{{$hospital}}</option>
                                                    @endforeach

                                                </select>

                                                <a class="btn btn-danger" ng-show="$last" ng-click="removeChoice()">-</a>
                                            </fieldset>

                                            <a class="btn btn-success addfields" ng-click="addNewChoice()">Add More Option</a>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Chamber</label>
                                            <input name="doctor_chamber" class="form-control" placeholder="Enter text">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <h4 class="page-header">Available in a week</h4>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">

                                                            <label>Day From</label>
                                            
                                                            <select name="day_from" class="form-control">
                                                                <option value="Monday">Monday</option>
                                                                <option value="Tuesday">Tuesday</option>
                                                                <option value="Wednesday">Wednesday</option>
                                                                <option value="Thursday">Thursday</option>
                                                                <option value="Friday">Friday</option>
                                                                <option value="Saturday">Saturday</option>
                                                                <option value="Sunday">Sunday</option>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>    

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Day To</label>
                                                            <select name="day_to" class="form-control" ng-model="dayto">
                                                                <option value="Monday">Monday</option>
                                                                <option value="Tuesday">Tuesday</option>
                                                                <option value="Wednesday">Wednesday</option>
                                                                <option value="Thursday">Thursday</option>
                                                                <option value="Friday">Friday</option>
                                                                <option value="Saturday">Saturday</option>
                                                                <option value="Sunday">Sunday</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Available Time</label>
                                                            <input name="available_time" class="form-control" placeholder="Sample input 1pm-8pm">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Chamber Address</label>
                                            <textarea name="chamber_location" class="form-control" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <textarea name="doctor_contact" class="form-control" rows="3" placeholder="Add multiple contact separated by comma (,)"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Area Name</label>
                                            <input name="doctor_area" class="form-control" placeholder="Enter Text">
                                        </div>

                                        <div class="form-group">
                                            <label>Select City</label>
                                            <select name="doctor_district" class="form-control">
                                                
                                                @foreach($districts as $id => $district)
                                                    <option value={{$district}}>{{$district}}</option>
                                                @endforeach                   

                                            </select>
                                        </div>

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

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Doctor's Additional Information Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Organization</label>
                                        <select name="doctor_organization" class="form-control">
                                            <option>Dhaka Medical College Hospital</option>
                                            <option>Bangabandhu Sheikh Mujib Medical University (BSMMU)</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Doctor's Image</label>
                                        <input type="file">
                                    </div>

                                    <div class="form-group">
                                        <label>Professional Training</label>
                                        <textarea name="doctor_professional_training" class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Working Experience</label>
                                        <textarea name="doctor_working_experience" class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Award & Achievement</label>
                                        <textarea name="doctor_award" class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Research or Publication</label>
                                        <textarea name="doctor_research" class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Membership</label>
                                        <textarea name="doctor_membership" class="form-control" rows="3"></textarea>
                                    </div> 
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                        <input type="submit" value="ADD Doctor" class="btn btn-default">
                    </form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->            

@stop

@section('scripts')

<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>

    <script type="text/javascript">
        var app = angular.module('angularjs-starter', []);

        app.controller('MainCtrl', function($scope) {

            $scope.choices = [];
              
            $scope.addNewChoice = function() {
                var newItemNo = $scope.choices.length+1;
                $scope.choices.push({'id':'choice'+newItemNo});
            };
                
            $scope.removeChoice = function() {
                var lastItem = $scope.choices.length-1;
                $scope.choices.splice(lastItem);
            };
          
        });
    </script>

@stop
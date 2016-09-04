@extends('layouts.master')

@section('title', 'DTMA- Dashboard')

@section('content')

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DTMA- Dashboard
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Home</a>
                                </li>
                                <li><a href="#profile-pills" data-toggle="tab">About</a>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <h4>Home </h4>
                                    <p>This is a dashboard for our medical application. Basically by using this dashboard admin can manage website content. Can store, edit, delete various types of data related about our application. Only authorize people can use this dashboard. This is very sensitive because you can delete or store application data by using this dashboard.</p>
                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                    <h4>About</h4>
                                    <p>DTMA stands for DreamzTouch Medical Application. This is a very useful website to help people about their health issue. Anyone can find Doctor, Medical, Ambulance and Blood Bank information by using this simple website. This website is a bundle package about all health related issue.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>

@stop
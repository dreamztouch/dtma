            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-user-md"></i> Doctors<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_doctor.html"><i class="fa fa-plus"></i> Add Doctor</a>
                                </li>
                                <li>
                                    <a href="edit_doctor.html"><i class="fa fa-pencil-square-o"></i> Edit Doctor</a>
                                </li>

                                <li>
                                    <a href="delete_doctor.html"><i class="fa fa-remove"></i> Delete Doctor</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-h-square"></i> Hospitals<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('hospital.create') }}"><i class="fa fa-plus"></i> Add Hospital</a>
                                </li>
                                <li>
                                    <a href="{{ route('hospital.editall') }}"><i class="fa fa-pencil-square-o"></i> Edit Hospital</a>
                                </li>

                                <li>
                                    <a href="{{ route('hospital.deleteall') }}"><i class="fa fa-remove"></i> Delete Hospital</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-ambulance"></i> Ambulance<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('ambulance.create') }}"><i class="fa fa-plus"></i> Add Ambulance</a>
                                </li>
                                <li>
                                    <a href="{{ route('ambulance.editall') }}"><i class="fa fa-pencil-square-o"></i> Edit Ambulance</a>
                                </li>

                                <li>
                                    <a href="{{ route('ambulance.deleteall') }}"><i class="fa fa-remove"></i> Delete Ambulance</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-medkit"></i> Blood Bank<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('bloodbank.create') }}"><i class="fa fa-plus"></i> Add Blood Bank</a>
                                </li>
                                <li>
                                    <a href="{{ route('bloodbank.editall') }}"><i class="fa fa-pencil-square-o"></i> Edit Blood Bank</a>
                                </li>

                                <li>
                                    <a href="{{ route('bloodbank.deleteall') }}"><i class="fa fa-remove"></i> Delete Blood Bank</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<x-app-layout>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employee Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('employee.index')}}">Employees</a></li>
                            <li class="breadcrumb-item active">Edit Employee</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @include('backend.partial.messages')

        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Edit Employee - {{$employee->user_name}}</h3>
                        <div class="card-tools">
                            <a href="{{route('employee.create')}}">
                                <x-jet-button class="btn btn-primary">
                                    Add New Employee
                                </x-jet-button>
                            </a>
                            <a href="{{route('employee.index')}}">
                                <x-jet-button class="btn btn-primary">
                                    All Employees
                                </x-jet-button>
                            </a>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{route('employee.update', $employee->id)}}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="emp_no">Employee ID</label>
                                                    <x-jet-input required type="text" class="form-control" id="emp_no" name="emp_no" value="{{$employee->emp_no}}" placeholder="Employee No" readonly="readonly" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <x-jet-input required type="text" class="form-control" id="first_name" name="first_name" value="{{$employee->first_name}}" placeholder="First Name" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <x-jet-input required type="text" class="form-control" id="last_name" name="last_name" value="{{$employee->last_name}}" placeholder="Last Name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="home_phone">Home Phone</label>
                                                    <x-jet-input type="tel" class="form-control" id="home_phone" name="home_phone" value="{{$employee->home_phone}}" placeholder="Home Phone" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="personal_phone">Personal Phone</label>
                                                    <x-jet-input type="tel" class="form-control" id="personal_phone" name="personal_phone" value="{{$employee->personal_phone}}" placeholder="Personal Phone" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Personal Email</label>
                                                    <x-jet-input type="tel" class="form-control" id="email" name="email" value="{{$employee->email}}" placeholder="Personal Email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date Of Birth</label>
                                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                        <x-jet-input type="text" name="date_of_birth" class="form-control datetimepicker-input" value="{{$employee->date_of_birth}}" placeholder="Date Of Birth" data-target="#reservationdate" />
                                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="marital_status">Marital Status</label>
                                                    <select class="form-control" id="marital_status" name="marital_status">
                                                        <option>{{$employee->marital_status}}</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="divorced">Divorced</option>
                                                        <option value="widowed">Widowed </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <x-jet-input type="text" class="form-control" id="country" name="country" value="{{$employee->country}}" placeholder="Country Name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="blood_group">Blood Group</label>
                                                    <select class="form-control" id="blood_group" name="blood_group">
                                                        <option>{{$employee->blood_group}}</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="religion">Religion</label>
                                                    <select class="form-control" id="religion" name="religion">
                                                        <option>{{$employee->religion}}</option>
                                                        <option value="Muslims">Muslims</option>
                                                        <option value="Hindus">Hindus</option>
                                                        <option value="Christians">Christians</option>
                                                        <option value="Buddhists">Buddhists</option>
                                                        <option value="Non Religious">Non Religious</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option>{{$employee->gender}}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hire Date</label>
                                                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                        <x-jet-input type="text" name="hire_date" class="form-control datetimepicker-input" value="{{$employee->hire_date}}" placeholder="Hire Date" data-target="#reservationdate1" />
                                                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Probation End Date</label>
                                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                        <x-jet-input type="text" name="probation_end_date" class="form-control datetimepicker-input" value="{{$employee->probation_end_date}}" placeholder="Probation End Date" data-target="#reservationdate2" />
                                                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="employee_type">Employee Type</label>
                                                    <select class="form-control" id="employee_type" name="emp_type">
                                                        <option>{{$employee->emp_type}}</option>
                                                        <option value="Full Time">Full Time</option>
                                                        <option value="Part Time">Part Time</option>
                                                        <option value="Contructual">Contructual</option>
                                                        <option value="Permanent">Permanent</option>
                                                        <option value="Probation">Probation</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date Of Permanent</label>
                                                    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                                                        <x-jet-input type="text" name="date_of_permanent" class="form-control datetimepicker-input" value="{{$employee->date_of_permanent}}" placeholder="Date Of Permanent" data-target="#reservationdate3" />
                                                        <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emergency_contact_no">Emergency Contact No.</label>
                                                    <x-jet-input type="text" class="form-control" id="emergency_contact_no" name="emergency_contact_no" value="{{$employee->emergency_contact_no}}" placeholder="Emergency Contact No." />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="department">Department</label>
                                                    <select class="form-control" id="department" name="department">
                                                        <option>{{$employee->department}}</option>
                                                        <option value="Backend">Backend</option>
                                                        <option value="Frontend">Frontend</option>
                                                        <option value="SQA">SQA</option>
                                                        <option value="Mobile Application">Mobile Application</option>
                                                        <option value="Database">Database</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="unit">Unit</label>
                                                    <select class="form-control" id="unit" name="unit">
                                                        <option>{{$employee->unit}}</option>
                                                        <option value="Unit 1">Unit 1</option>
                                                        <option value="Unit 2">Unit 2</option>
                                                        <option value="Unit 3">Unit 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designation">Designation</label>
                                                    <select class="form-control" id="designation" name="designation">
                                                        <option>{{$employee->designation}}</option>
                                                        <option value="Designation 1">Designation 1</option>
                                                        <option value="Designation 2">Designation 2</option>
                                                        <option value="Designation 3">Designation 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="grade">Grade</label>
                                                    <select class="form-control" id="grade" name="grade">
                                                        <option>{{$employee->grade}}</option>
                                                        <option value="Grade 1">Grade 1</option>
                                                        <option value="Grade 2">Grade 2</option>
                                                        <option value="Grade 3">Grade 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="reporting_to">Reporting To</label>
                                                    <x-jet-input type="tel" class="form-control" id="reporting_to" name="reporting_to" value="{{$employee->reporting_to}}" placeholder="Reporting To" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Termination</label>
                                                    <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                                        <x-jet-input type="text" name="termination" class="form-control datetimepicker-input" value="{{$employee->termination}}" placeholder="Termination" data-target="#reservationdate4" />
                                                        <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="termination_note">Termination Note</label>
                                                    <x-jet-input type="file" class="form-control" id="termination_note" name="termination_note" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="present_address">Present Address</label>
                                                    <x-jet-input type="text" class="form-control" id="present_address" name="present_address" value="{{$employee->present_address}}" placeholder="Present Address" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="permanent_address">Permanent Address</label>
                                                    <x-jet-input type="text" class="form-control" id="permanent_address" name="permanent_address" value="{{$employee->permanent_address}}" placeholder="Permanent Address" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="photo">Photo</label>
                                                    <x-jet-input type="file" class="form-control" id="photo" name="photo" accept=".jpg, .jpeg, .png, .svg, .webp" onchange="loadFile(event)" />
                                                </div>
                                            </div>
                                        </div>

                                        @if($employee->photo)

                                        <div class="row">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="{{asset($employee->photo)}}" id="output" style="width: 100px; height: auto" />
                                            </div>
                                        </div>

                                        @else

                                        <div class="row">
                                            <div class="card mb-2">
                                                <img class="card-img-top" id="output" style="width: 100px; height: auto" />
                                            </div>
                                        </div>

                                        @endif

                                    </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-jet-button class="ml-4 btn btn-primary swalDefaultSuccess" style="float: right;">
                                {{ __('Update') }}
                            </x-jet-button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

</x-app-layout>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
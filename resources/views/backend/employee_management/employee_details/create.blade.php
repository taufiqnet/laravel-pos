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
                            <li class="breadcrumb-item active">Add Employee Details</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @include('backend.partial.messages')

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-plus"></i> Employee Details</h3>
                                <div class="card-tools">
                                    <a href="{{route('employee.index')}}">
                                        <x-jet-button class="btn btn-primary">
                                            All Employees
                                        </x-jet-button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('employeeDetails.store', $employee->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emp_no">Employee No</label>
                                                <input type="text" name="emp_no" class="form-control" id="emp_no" placeholder="Employee No" value="{{$employee->emp_no}}" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="father_name">Father Name</label>
                                                <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Father Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mother_name">Mother Name</label>
                                                <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Mother Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="spouse">Spouse</label>
                                                <input type="text" name="spouse" class="form-control" id="spouse" placeholder="Spouse">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tin">Tin</label>
                                                <input type="text" name="tin" class="form-control" id="tin" placeholder="Tin">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nid">Nid</label>
                                                <input type="text" name="nid" class="form-control" id="nid" placeholder="Nid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="education">Education</label>
                                                <input type="text" name="education" class="form-control" id="education" placeholder="Education">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="training">Training</label>
                                                <input type="text" name="training" class="form-control" id="training" placeholder="Training">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="experience">Experience</label>
                                                <input type="text" name="experience" class="form-control" id="experience" placeholder="Experience">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ssc_certificate">SSC Certificate</label>
                                                <input type="file" class="form-control" id="ssc_certificate" name="ssc_certificate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hsc_certificate">HSC Certificate</label>
                                                <input type="file" class="form-control" id="hsc_certificate" name="hsc_certificate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="honors_certificate">Honors Certificate</label>
                                                <input type="file" class="form-control" id="honors_certificate" name="honors_certificate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="masters_certificate">Masters Certificate</label>
                                                <input type="file" class="form-control" id="masters_certificate" name="masters_certificate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="resume">Resume</label>
                                                <input type="file" class="form-control" id="resume" name="resume">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="personal_file">Personal File</label>
                                                <input type="file" class="form-control" id="personal_file" name="personal_file">
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

    </div>
    <!-- /.content-wrapper -->

</x-app-layout>
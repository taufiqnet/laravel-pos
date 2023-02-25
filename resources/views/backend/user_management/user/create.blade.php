<x-app-layout>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('users')}}">Users</a></li>
                            <li class="breadcrumb-item active">Add New User</li>

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
                        <h3 class="card-title">Create New User</h3>
                        <div class="card-tools">
                            <a href="{{route('users')}}">
                                <x-jet-button class="btn btn-primary">
                                    All Users
                                </x-jet-button>
                            </a>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{route('store_user')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row col-md-12">

                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('Select Employee*') }}" />
                                                <div class="select2-purple">
                                                    <select required name="emp_id" id="emp_id" class="form-control select2" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        @foreach($employees as $employee)
                                                        <option value="{{$employee->id}}" data-empusername="{{$employee->user_name}}" data-empfullname="{{$employee->first_name}} {{$employee->last_name}}" data-empemail="{{$employee->email}}"> {{$employee->user_name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('User Name*') }}" />
                                                <x-jet-input required placeholder="Enter a User Name" id="user_name" class="form-control" type="text" name="user_name" :value="old('user_name')" readonly="readonly" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('User Full Name*') }}" />
                                                <x-jet-input required placeholder="Enter a User Full Name" id="full_name" class="form-control" type="text" name="full_name" :value="old('full_name')" readonly="readonly" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('User Email') }}" />
                                                <x-jet-input placeholder="Enter a User Email" id="email" class="form-control" type="email" name="email" :value="old('email')" autofocus />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('Password*') }}" />
                                                <x-jet-input required placeholder="Enter a Password" id="password" class="form-control" type="password" name="password" autofocus />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('Confirm Password*') }}" />
                                                <x-jet-input required placeholder="Enter a Confirm Password" id="password_confirmation" class="form-control" type="password" name="password_confirmation" autofocus />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('Select Role*') }}" />
                                                <div class="select2-purple">
                                                    <select required name="roles[]" id="role" class="form-control select2" data-placeholder="Select Roles" data-dropdown-css-class="select2-purple" multiple style="width: 100%;">
                                                        @foreach($roles as $role)
                                                        <option value="{{$role->name}}"> {{$role->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">User Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option>--Select--</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-jet-button class="ml-4 btn btn-primary swalDefaultSuccess" style="float: right;">
                                {{ __('Create') }}
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
    $(function() {
        var empusername = $(this).find('option:selected').attr('data-empusername');
        $('#user_name').val(empusername);

        var empfullname = $(this).find('option:selected').attr('data-empfullname');
        $('#full_name').val(empfullname);

        var empemail = $(this).find('option:selected').attr('data-empemail');
        $('#email').val(empemail);
    })

    $('#emp_id').change(function() {
        var empusername = $(this).find('option:selected').attr('data-empusername');
        $('#user_name').val(empusername);

        var empfullname = $(this).find('option:selected').attr('data-empfullname');
        $('#full_name').val(empfullname);

        var empemail = $(this).find('option:selected').attr('data-empemail');
        $('#email').val(empemail);

    });
</script>
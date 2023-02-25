<x-app-layout>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Role Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('roles')}}">Roles</a></li>
                            <li class="breadcrumb-item active">Add New Role</li>
                           
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
                        <h3 class="card-title">Create New Role</h3>
                        <div class="card-tools">
                            <a href="{{route('roles')}}">
                                <x-jet-button class="btn btn-primary">
                                    All Roles
                                </x-jet-button>
                            </a>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{route('store_role')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('Role Name*') }}" />
                                                <x-jet-input required placeholder="Enter a Role Name" id="name" class="form-control" type="text" name="name" :value="old('name')" autofocus />
                                            </div>

                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('Select Permission*') }}" />

                                                <br />

                                                <div class="icheck-success">
                                                    <input type="checkbox" id="checkPermissionAll" value="1">
                                                    <label for="checkPermissionAll">
                                                        All
                                                    </label>
                                                </div>
                                                <hr />

                                                @php $i = 1; @endphp
                                                @foreach ($permission_groups as $group)
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-9 role-{{ $i }}-management-checkbox">
                                                        @php
                                                        $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                                        $j = 1;
                                                        @endphp
                                                        @foreach ($permissions as $permission)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                            <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                        @php $j++; @endphp
                                                        @endforeach
                                                        <br>
                                                    </div>

                                                </div>
                                                @php $i++; @endphp
                                                @endforeach


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
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

</x-app-layout>

@include('backend.user_management.role.scripts')
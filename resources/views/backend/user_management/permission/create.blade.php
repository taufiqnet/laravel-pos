<x-app-layout>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Permission Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('roles')}}">Roles</a></li>
                            <li class="breadcrumb-item active">Add New Permission</li>

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
                        <h3 class="card-title">Create New Permission</h3>
                        <div class="card-tools">
                            <a href="{{route('create_group')}}">
                                <x-jet-button class="btn btn-primary">
                                    Add New Group
                                </x-jet-button>
                            </a>
                            <a href="{{route('permissions')}}">
                                <x-jet-button class="btn btn-primary">
                                    All Permissions
                                </x-jet-button>
                            </a>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{route('store_permission')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('Permission Name*') }}" />
                                                <x-jet-input required placeholder="Enter a Permission Name" id="name" class="form-control" type="text" name="name" :value="old('name')" autofocus />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <x-jet-label value="{{ __('Select Permission Group*') }}" />
                                                <select required name="group_id" class="form-control select2" style="width: 100%;">
                                                    @foreach($permission_groups as $group)
                                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                                    @endforeach
                                                </select>
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
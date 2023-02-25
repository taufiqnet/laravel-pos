<x-app-layout>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Permission Group Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('roles')}}">Roles</a></li>
                            <li class="breadcrumb-item"><a href="{{route('permissions')}}">Permissions</a></li>
                            <li class="breadcrumb-item active">Edit Permission Group</li>

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
                        <h3 class="card-title">Edit Permission Group - {{$group->name}}</h3>
                        <div class="card-tools">
                            <a href="{{route('create_group')}}">
                                <x-jet-button class="btn btn-primary">
                                    Add New Group
                                </x-jet-button>
                            </a>
                            <a href="{{route('create_permission')}}">
                                <x-jet-button class="btn btn-primary">
                                    Add New Permission
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
                                <form method="POST" action="{{route('update_group', $group->id)}}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('Permission Group Name*') }}" />
                                                <x-jet-input required placeholder="Enter a Permission Group Name" id="name" class="form-control" type="text" name="name" value="{{$group->name}}" autofocus />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <x-jet-label value="{{ __('Order No.*') }}" />
                                                <x-jet-input required placeholder="1" id="order_no" class="form-control" type="number" name="order_no" value="{{$group->order_no}}" autofocus />
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
                </div>
            </div>
    </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_groups as $group)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$group->name}}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{route('edit_group', $group->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('delete_group', $group->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </div>
    </section>

    </div>
    <!-- /.content-wrapper -->

</x-app-layout>
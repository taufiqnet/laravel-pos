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
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @include('backend.partial.messages')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Users</h3>
                                <div class="card-tools">
                                    <a href="{{route('create_user')}}">
                                        <x-jet-button class="btn btn-primary">
                                            Add New User
                                        </x-jet-button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>User Name</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th width="30%">Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$user->user_name}}</td>
                                            <td>{{$user->full_name}}</td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                <span class="badge badge-success">{{$role->name}}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($user->status == 1)
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    @if(Auth::user()->hasRole('Superadmin'))
                                                    <a href="{{route('edit_user', $user->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('delete_user', $user->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    @elseif($user->hasRole('Superadmin'))
                                                    <p></p>
                                                    @else
                                                    @if(Auth::user()->can('Edit Users'))
                                                    <a href="{{route('edit_user', $user->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                    @endif
                                                    @if(Auth::user()->can('Delete Users'))
                                                    <a href="{{route('delete_user', $user->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    @endif
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL.</th>
                                            <th>User Name</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th width="30%">Role</th>
                                            <th>Status</th>
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</x-app-layout>
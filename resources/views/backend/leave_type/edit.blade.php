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
                            <li class="breadcrumb-item"><a href="{{route('leavetypes.index')}}">Leave Types</a></li>
                            <li class="breadcrumb-item active">Add New Leave Types</li>

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
                        <h3 class="card-title">Edit Leave Type - {{$leave_types->leave_type}}</h3>
                        <div class="card-tools">
                            <a href="{{route('leavetypes.create')}}">
                                <x-jet-button class="btn btn-primary">
                                    Add New Leave Type
                                </x-jet-button>
                            </a>
                            <a href="{{route('leavetypes.index')}}">
                                <x-jet-button class="btn btn-primary">
                                    All Leave Types
                                </x-jet-button>
                            </a>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{route('leavetypes.update', $leave_types->id)}}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="leave_type">Leave Type</label>
                                                    <x-jet-input required type="text" class="form-control" id="leave_type" name="leave_type" value="{{$leave_types->leave_type}}" placeholder="Enter Leave Type" />
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <x-jet-input required type="text" class="form-control" id="description" name="description" value="{{$leave_types->description}}" placeholder="Enter Description" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="max_day">Max Day</label>
                                                    <x-jet-input type="tel" class="form-control" id="max_day" name="max_day" value="{{$leave_types->max_day}}" placeholder="Enter max day" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">User Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        @if($leave_types->status == 1)
                                                        <option value="{{$leave_types->status}}">Active</option>
                                                        @else
                                                        <option value="{{$leave_types->status}}">Inactive</option>
                                                        @endif
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                    

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
<x-app-layout>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Branch Of {{ $company->company_name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('branch.index') }}">Branch List</a></li>
                            <li class="breadcrumb-item active">{{ $branch->branch_name }}</li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $branch->branch_name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Branch Name</th>
                                            <td>{{ $branch->branch_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $branch->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact No 1</th>
                                            <td>{{ $branch->contact_no_1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact No 2</th>
                                            <td>{{ $branch->contact_no_2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $branch->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fax</th>
                                            <td>{{ $branch->fax }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('branch.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</x-app-layout>


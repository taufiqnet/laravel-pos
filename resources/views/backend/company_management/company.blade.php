<x-app-layout>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Company Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Company Details</li>
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
                                <h3 class="card-title">Company Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('company.update', $company->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="card-body">
                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ url('storage/'.$company->logo) }}" alt="logo">
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ asset('storage/' . $company->banner) }}" alt="banner">
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="company_name">Company Name</label>
                                                <input type="text" class="form-control" id="company_name"
                                                    name="company_name" value="{{ $company->company_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ $company->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_no_1">Contact No 1</label>
                                                <input type="text" class="form-control" id="contact_no_1"
                                                    name="contact_no_1" value="{{ $company->contact_no_1 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_no_2">Contact No 2</label>
                                                <input type="text" class="form-control" id="contact_no_2"
                                                    name="contact_no_2" value="{{ $company->contact_no_2 }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fax">Fax</label>
                                                <input type="text" class="form-control" id="fax" name="fax"
                                                    value="{{ $company->fax }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address_1">Address 1</label>
                                                <input type="text" class="form-control" id="address_1"
                                                    name="address_1" value="{{ $company->address_1 }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address_2">Address 2</label>
                                                <input type="text" class="form-control" id="address_2"
                                                    name="address_2" value="{{ $company->address_2 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" id="city" name="city"
                                                    value="{{ $company->city }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <input type="text" class="form-control" id="district"
                                                    name="district" value="{{ $company->district }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="division">Division</label>
                                                <input type="text" class="form-control" id="division"
                                                    name="division" value="{{ $company->division }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" id="state"
                                                    name="state" value="{{ $company->state }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="country"
                                                    name="country" value="{{ $company->country }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" class="form-control" id="website"
                                                    name="website" value="{{ $company->website }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="linkedin">Linkedin</label>
                                                <input type="text" class="form-control" id="linkedin"
                                                    name="linkedin" value="{{ $company->linkedin }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="facebook">Facebook</label>
                                                <input type="text" class="form-control" id="facebook"
                                                    name="facebook" value="{{ $company->facebook }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="youtube">Youtube</label>
                                                <input type="text" class="form-control" id="youtube"
                                                    name="youtube" value="{{ $company->youtube }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="twitter">Twitter</label>
                                                <input type="text" class="form-control" id="twitter"
                                                    name="twitter" value="{{ $company->twitter }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="instagram">Instagram</label>
                                                <input type="text" class="form-control" id="instagram"
                                                    name="instagram" value="{{ $company->instagram }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="is_active">Status</label>
                                                <input type="text" class="form-control" id="is_active"
                                                    name="is_active"
                                                    @if ($company->is_active == 1) value="Active"
                                                    @elseif ($company->is_active == 0)
                                                        value="Inactive" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="others">Others</label>
                                                <textarea type="text" class="form-control" id="others" name="others">
                                                    {{ $company->others }}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="logo">Logo</label>
                                                <input type="file" class="form-control" id="logo"
                                                    name="logo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="banner">Banner</label>
                                                <input type="file" class="form-control" id="banner"
                                                    name="banner" onchange="getImagePreview(event)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</x-app-layout>



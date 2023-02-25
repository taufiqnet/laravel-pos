@include('backend.partial.messages')

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{route('employee_register')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group" style="text-align: left;">
                                        <x-jet-label value="{{ __('Employee Name*') }}" />
                                        <x-jet-input required placeholder="Enter First Name" id="name" class="form-control" type="text" name="first_name" :value="old('first_name')" autofocus />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="text-align: left;">
                                        <x-jet-label value="{{ __('Employee Email*') }}" />
                                        <x-jet-input required placeholder="Enter Last Name" id="email" class="form-control" type="text" name="last_name" :value="old('last_name')" autofocus />
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
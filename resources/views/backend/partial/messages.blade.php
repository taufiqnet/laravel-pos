@if($errors->any())

    <div class="col-md-12">
        <div class="card bg-danger">
            <div class="card-header">

                @foreach($errors->all() as $error)
                    <h3 class="card-title">{{$error}}</h3> <br />
                @endforeach

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

@endif

@if(Session::has('success'))

    <div class="col-md-12">
        <div class="card bg-success">
            <div class="card-header">

                <h3 class="card-title">{{Session::get('success')}}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

@endif

@extends('user-master')

@section('title', ' Manage Sample')

@section('css')

@endsection

@section('style')

@endsection

@section('breadcrumb-title')
    <h3>Edit Sample</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Edit Sample</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Sample Details</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('sample/'. $sample->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- <div class="role_box">
                            <div class="row mb-3 form-group">
                                <label for="type" class="col-md-4 col-form-label text-md-end"><span>* </span>Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type" id="role">
                                        <option selected disabled>Please Select...</option>
                                        <option value="1"}>Design</option>
                                        <option value="1"}>Market</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-3 form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $sample->name ?? ''}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#eye_pass').click(function(){
        if ($('#password').attr('type') == 'text') {
            $('#password').attr('type', 'password');
            $(this).html('Show');
        } else {
            $('#password').attr('type', 'text');
            $(this).html('Hide');
        }
    });
    $('#eye_c_pass').click(function(){
        if ($('#password-confirm').attr('type') == 'text') {
            $('#password-confirm').attr('type', 'password');
            $(this).html('Show');
        } else {
            $('#password-confirm').attr('type', 'text');
            $(this).html('Hide');
        }
    });
   
</script>
@endsection
z
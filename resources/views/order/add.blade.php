@extends('user-master')

@section('title', ' Manage Orders')

@section('css')

@endsection

@section('style')

@endsection

@section('breadcrumb-title')
<h3>Add Sample</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item">Settings</li>
<li class="breadcrumb-item active">Add Order</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Sample Details</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('order.store') }}">
                        @csrf

                        <div class="role_box">
                            <div class="row mb-3 form-group">
                                <label for="type" class="col-md-4 col-form-label text-md-end"><span>* </span>Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="customer_id" id="customer_id">
                                        <option selected disabled>Please Select Customer</option>
                                        @foreach ($customer as $cus)
                                        <option value="{{$cus->id}}">{{$cus->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="role_box">
                            <div class="row mb-3 form-group">
                                <label for="type" class="col-md-4 col-form-label text-md-end"><span>* </span>Sample Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type" id="sampletype">
                                        <option selected disabled>Please Select Type</option>
                                        <option value="1">Design</option>
                                        <option value="2">Market</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="role_box">
                            <div class="row mb-3 form-group">
                                <label for="type" class="col-md-4 col-form-label text-md-end"><span>* </span>Select Sample</label>
                                <div class="col-md-6">
                                    <select id="samplename" name="samplename" class="form-control">
                                    </select>
                                </div>
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
    $('#eye_pass').click(function() {
        if ($('#password').attr('type') == 'text') {
            $('#password').attr('type', 'password');
            $(this).html('Show');
        } else {
            $('#password').attr('type', 'text');
            $(this).html('Hide');
        }
    });
    $('#eye_c_pass').click(function() {
        if ($('#password-confirm').attr('type') == 'text') {
            $('#password-confirm').attr('type', 'password');
            $(this).html('Show');
        } else {
            $('#password-confirm').attr('type', 'text');
            $(this).html('Hide');
        }
    });
    $('#customer_id').change(function() {

        // AJAX GET request
        $.ajax({
            url: 'get-customer',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                console.log(response);

            }
        });
    });

    $('#sampletype').on('change', function() {
        var idType = this.value;
        $("#samplename").html('');
        $.ajax({
            url: "{{url('api/fetch-sample')}}",
            type: "POST",
            data: {
                type: idType,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                console.log(result);
                $('#samplename').html('<option value="">Select Sample</option>');
                $.each(result.sample, function(key, value) {
                    $("#samplename").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
            }
        });
    });
</script>
</script>
@endsection
@extends('user-master')

@section('title', 'Welcome To Easy Returns Dashboard')

@section('css')

@endsection

@section('style')

@endsection

@section('breadcrumb-title')
    <h3>Add Employee</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Add Employee</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Employee Details</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3 form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="mobile" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-text text-dark" id="mobile">+91</span>
                                <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="off">
                            </div>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end"><span>* </span>{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" cols="30" rows="3" value="{{ old('address') }}" required ></textarea>
                                {{-- <input id="address" type="tel" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="off"> --}}

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3 form-group">
                            <label class="col-md-4 col-form-label text-md-end"><span>* </span> Status</label>
                            <div class="col-md-6 m-checkbox-inline radio-animated d-flex align-items-end">
                                <label class="d-block" for="edo-ani">
                                    <input class="radio_animated" id="edo-ani" type="radio" name="status"
                                        value="1" checked>
                                    Enable
                                </label>
                                <label class="d-block" for="edo-ani1">
                                    <input class="radio_animated" id="edo-ani1" type="radio" name="status"
                                        value="0" >
                                    Disable
                                </label>
                            </div>
                        </div>
                 
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Employee') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

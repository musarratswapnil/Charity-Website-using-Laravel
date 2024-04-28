@extends('front.layouts.app')

@section('main_content')
<div class="page-top" style="background-image: url({{ asset('uploads/'. $global_setting_data->banner) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Forget Password</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Reset Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content pt_70 pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <form method="post" action="{{ route('customer_reset_password_submit') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="login-form">
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>                                    
                        @endif
                    </div>
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password">
                            @if($errors->has('retype_password'))
                                <span class="text-danger">{{ $errors->first('retype_password') }}</span>                                    
                            @endif
                        </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
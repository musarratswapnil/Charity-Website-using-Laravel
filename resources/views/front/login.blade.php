@extends('front.layouts.app')


@section('main_content')

<div class="page-top" style=" background-image: url({{ asset('uploads/'. $global_setting_data->banner) }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Login</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
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
            <form method="post" action="{{ route('customer_login_submit') }}">
                @csrf
                <div class="login-form">
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email">
                        {{-- @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif --}}
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        {{-- @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>                                    
                        @endif --}}
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">
                            Login
                        </button>
                        <a href="{{ route('customer_forget_password') }}" class="primary-color">Forget Password?</a>
                    </div>
                    <div class="mb-3">
                        <a href="register.html" class="primary-color">Don't have an account? Create Account</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
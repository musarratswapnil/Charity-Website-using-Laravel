@extends('admin.layout.app')

@section('heading', 'Edit Profile')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 class="text-primary">Profile</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <form method="POST" action="{{ route('admin_profile_submit') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        @if (Auth::guard('customer')->user()->photo == '')
                                        <img src="{{ asset('uploads/default.png') }}" alt="" class="profile-photo w_100_p">
                                        @else
                                        <img src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" alt="" class="profile-photo w_100_p">
                                        @endif
                                        <input type="file" class="form-control mt_10" name="photo">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label class="form-label text-primary">Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{Auth::guard('admin')->user()->name}}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label text-primary">Email *</label>
                                            <input type="email" class="form-control" name="email" value="{{Auth::guard('admin')->user()->email}}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label text-primary">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label text-primary">Retype Password</label>
                                            <input type="password" class="form-control" name="retype_password">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label text-primary"></label>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
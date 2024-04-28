@extends('front.layouts.app')

@section('main_content')

<div class="page-top" style="background-image: url({{ asset('uploads/'. $global_setting_data->banner) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>ContactAbout Us</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact pt_70">
    <div class="container">
        <div class="row">
            @if($global_setting_data->map=='')
            @php $column=12; @endphp
            @else
            @php $column=6; @endphp
            <div class="col-lg-{{ $column }} col-md-12">
                <div class="contact-form pb_70">
                    <form method="post"  action="{{ route('contact_send_message') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="" name="name" class="form-label">Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="" name="email" class="form-label">Email Address</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="" name="message" class="form-label">Message</label>
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit">
                                Send Message  <i class="fas fa-long-arrow-alt-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if($global_setting_data->map!='')
            <div class="col-lg-6 col-md-12">
                <div class="map">
                    {{ $global_setting_data->map }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection
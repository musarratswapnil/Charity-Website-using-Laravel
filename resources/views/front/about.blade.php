@extends('front.layouts.app')

@section('main_content')

<div class="page-top" style="background-image: url({{ asset('uploads/'. $global_setting_data->banner) }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>About Us</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

@if($mission->status== 'Show')
<div class="special pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-side">
                                <div class="inner">
                                    <h2>{{ $mission->sub_heading }}</h2>
                                    <h3>{{ $mission->heading }}</h3>
                                    {!! 
                                    $mission->text !!}
                                    <div class="button-style-1 mt_20">
                                        <a href="{{ $mission->button_link }}">{{ $mission->button_text }}<i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right-side" style="background-image: url('{{ asset('uploads/'.$mission->photo) }}');">
                                <a class="video-button" href="https://www.youtube.com/watch?v={{ $mission->video_id }}"><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($feature_section_items->status== 'Show')
<div class="why-choose pt_70" style="background-image: url({{ asset('uploads/'. $feature_section_items->photo) }})">
    <div class="container">
        <div class="row">
            @foreach ($features as $feature)
            <div class="col-md-4">
                <div class="inner pb_70">
                    <div class="icon">
                        <i class="{{ $feature->icon }}"></i>
                    </div>
                    <div class="text">
                        <h2>{{ $feature->heading }}</h2>
                        <p>
                            {!! $feature->text !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif



<div class="counter-section pt_70 pb_70">
    <div class="container">
        <div class="row counter-items">
            <div class="col-md-3 counter-item">
                <div class="counter">1145</div>
                <div class="text">Donations</div>
            </div>
            <div class="col-md-3 counter-item">
                <div class="counter">300</div>
                <div class="text">Volunteers</div>
            </div>
            <div class="col-md-3 counter-item">
                <div class="counter">130</div>
                <div class="text">Projects</div>
            </div>
            <div class="col-md-3 counter-item">
                <div class="counter">160</div>
                <div class="text">Events Organized</div>
            </div>
        </div>
    </div>
</div>

@endsection
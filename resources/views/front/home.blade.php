@extends('front.layouts.app')

@section('main_content')
<div class="slider">
    <div class="slide-carousel owl-carousel">

        @foreach ($slider as $slide)
        <div class="item" style="background-image:url('{{ asset('uploads/'.$slide->photo) }}');">
            <div class="bg"></div>
            <div class="text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-wrapper">
                                <div class="text-content">
                                    <h2>{!! $slide->heading !!}</h2>
                                    <p>
                                        {{ $slide->text }}
                                    </p>
                                    <div class="button-style-1 mt_20">
                                        <a href="{{ $slide->button_link }}">{{ $slide->button_text }} <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

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


@if($home_item->campaign_status == 'Show')
<div class="cause pt_70">
    <div class="container">
        
        @if( $home_item->campaign_heading != '' || $home_item->campaign_subheading != '' )
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>{{ $home_item->campaign_heading }}</h2>
                    <p>
                        {{ $home_item->campaign_subheading }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            @foreach($campaigns as $item)
            <div class="col-lg-4 col-md-6">
                <div class="item pb_70">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2>
                            <a href="{{ route('campaign', $item->slug) }}">{{ $item->name }}</a>
                        </h2>
                        <div class="short-des">
                            <p>
                                {!! nl2br($item->short_description) !!}
                            </p>
                        </div>
                        @php
                            $perc = ($item->raised / $item->goal) * 100;
                            $perc = ceil($perc);
                        @endphp
                        <div class="progress mb_10">
                            <div class="progress-bar w-0" role="progressbar" aria-label="Example with label" aria-valuenow="{{ $perc }}" aria-valuemin="0" aria-valuemax="100" style="animation: progressAnimation{{ $loop->iteration }} 2s linear forwards;"></div>
                            <style>
                                @keyframes progressAnimation{{ $loop->iteration }} {
                                    from {
                                        width: 0;
                                    }
                                    to {
                                        width: {{ $perc }}%;
                                    }
                                }
                            </style>
                        </div>
                        <div class="lbl mb_20">
                            <div class="goal">Goal: ${{ $item->goal }}</div>
                            <div class="raised">Raised: ${{ $item->raised }}</div>
                        </div>
                        <div class="button-style-2">
                            <a href="{{ route('campaign', $item->slug) }}">Donate Now <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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



@if($home_item->event_status == 'Show')
<div class="event pt_70">
    <div class="container">

        @if( $home_item->event_heading != '' || $home_item->event_subheading != '' )
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>{{ $home_item->event_heading }}</h2>
                    <p>
                        {{ $home_item->event_subheading }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            @foreach($events as $item)
            @php
            $current_timestamp = strtotime(date('Y-m-d H:i'));
            $event_timestamp = strtotime($item->date.' '.$item->time);
            @endphp

            @if($event_timestamp < $current_timestamp)
            @continue
            @endif

            <div class="col-lg-4 col-md-6">
                <div class="item pb_70">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2>
                            <a href="{{ route('event', $item->slug) }}">{{ $item->name }}</a>
                        </h2>
                        <div class="date-time">
                            <i class="fas fa-calendar-alt"></i> 
                            @php
                            $date = \Carbon\Carbon::parse($item->date)->format('j M, Y');
                            $time = \Carbon\Carbon::parse($item->time)->format('h:i A');
                            @endphp
                            {{ $date }}, {{ $time }}
                        </div>
                        <div class="short-des">
                            <p>
                                {!! nl2br($item->short_description) !!}
                            </p>
                        </div>
                        <div class="button-style-2">
                            <a href="{{ route('event', $item->slug) }}">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif



@if($goal->status == 'Show')
<div class="testimonial pt_70 pb_70" style="background-image: url({{ asset('uploads/'. $goal->photo) }})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">{{ $goal->heading }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel">
                    <div class="item">
                        <div class="text">
                            <h6>{{ $goal->sub_heading }}</h6>
                        </div>
                        <div class="description">
                            <p>
                                {!! $goal->text !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif



{{-- <div class="blog pt_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Latest News</h2>
                    <p>
                        Check out the latest news and updates from our blog post
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="item pb_70">
                    <div class="photo">
                        <img src="uploads/blog-1.jpg" alt="" />
                    </div>
                    <div class="text">
                        <h2>
                            <a href="post.html">Partnering to create a strong community</a>
                        </h2>
                        <div class="short-des">
                            <p>
                                In order to create a good community we need to work together. We need to help, support each other and be respectful to each other.
                            </p>
                        </div>
                        <div class="button-style-2 mt_20">
                            <a href="post.html">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item pb_70">
                    <div class="photo">
                        <img src="uploads/blog-2.jpg" alt="" />
                    </div>
                    <div class="text">
                        <h2>
                            <a href="post.html">Turning your emergency donation into instant aid</a>
                        </h2>
                        <div class="short-des">
                            <p>
                                We are working hard to help the poor people. We are trying to provide them food, shelter, clothing, education and medical assistance.
                            </p>
                        </div>
                        <div class="button-style-2 mt_20">
                            <a href="post.html">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item pb_70">
                    <div class="photo">
                        <img src="uploads/blog-3.jpg" alt="" />
                    </div>
                    <div class="text">
                        <h2>
                            <a href="post.html">Charity provides educational boost for children</a>
                        </h2>
                        <div class="short-des">
                            <p>
                                In order boost the education of the children, we are providing them books, pens, pencils, notebooks and other necessary things.
                            </p>
                        </div>
                        <div class="button-style-2 mt_20">
                            <a href="post.html">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
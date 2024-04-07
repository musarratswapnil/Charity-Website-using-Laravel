@extends('front.layouts.app')

@section('main_content')

<div class="page-top" style=" background-image: url('{{ asset("uploads/banner.jpg") }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Campaigns</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Campaigns</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="cause pt_70">
    <div class="container">
        <div class="row">
            @foreach ($campaigns as $item)
            <div class="col-lg-4 col-md-6">
                <div class="item pb_70">
                    <div class="photo">
                        <img src="{{ asset('uploads/' .$item->featured_photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2>
                            <a href="{{ route('campaign',$item->slug) }}">{{ $item->name }}</a>
                        </h2>
                        <div class="short-des">
                            <p>
                                {!! nl2br($item->short_description) !!}
                            </p>
                        </div>
                        @php
                            $percentage = ($item->raised/$item->goal)*100;
                            $percentage = ceil($percentage);
                        @endphp
                        <div class="progress mb_10">
                            <div class="progress-bar w-0" role="progressbar" aria-label="Example with label" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100" style="animation: progressAnimation{{ $loop->iteration }} 2s linear forwards;"></div>
                            <style>
                                @keyframes progressAnimation{{ $loop->iteration }} {
                                    from {width: 0;}
                                    to {width: {{ $percentage }}%;}
                                }
                            </style>
                        </div>
                        <div class="lbl mb_20">
                            <div class="goal">Goal: {{ $item->goal }}</div>
                            <div class="raised">Raised: {{ $item->raised }}</div>
                        </div>
                        <div class="button-style-2">
                            <a href="{{ route('campaign',$item->slug) }}">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>




@endsection
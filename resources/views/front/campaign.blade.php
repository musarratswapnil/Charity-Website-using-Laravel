@extends('front.layouts.app')

@section('main_content')

<div class="page-top" style=" background-image: url({{ asset('uploads/'. $global_setting_data->banner) }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $campaign->name }}</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('campaigns') }}">Campaign</a></li>
                        <li class="breadcrumb-item active">{{ $campaign->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="cause-detail pt_50 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="left-item">
                    <div class="main-photo">
                        <img src="{{ asset('uploads/'.$campaign->featured_photo) }}" alt="">
                    </div>
                    @php
                    $percentage = ($campaign->raised/$campaign->goal)*100;
                    $percentage = ceil($percentage);
                    @endphp
                    <div class="progress mb_10">
                        <div class="progress-bar w-0" role="progressbar" aria-label="Example with label" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="70" style="animation: progressAnimation1 2s linear forwards;"></div>
                        <style>
                            @keyframes progressAnimation1 {from {width: 0;}to {width: {{ $percentage }}%;}}
                        </style>
                    </div>
                    <div class="lbl mb_20">
                        <div class="goal">Goal: ${{ $campaign->goal }}</div>
                        <div class="raised">Raised: ${{ $campaign->raised }}</div>
                    </div>
                    {!! ($campaign->description) !!}
                </div>
                <div class="left-item">
                    <h2>
                        Photos
                    </h2>
                    <div class="photo-all">
                        <div class="row">
                            
                            @foreach ($campaign_photos as $item)
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a href="{{ asset('uploads/'.$item->photo) }}" class="magnific">
                                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="" />
                                        <div class="icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="left-item">
                    <h2>
                        Videos
                    </h2>
                    <div class="video-all">
                        <div class="row">

                            @foreach ($campaign_videos as $item)
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a class="video-button" href="http://www.youtube.com/watch?v={{ $item->youtube_video_id }}">
                                        <img src="http://img.youtube.com/vi/{{ $item->youtube_video_id }}/0.jpg" alt="" />
                                        <div class="icon">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>

                <div class="left-item faq-cause">
                    <h2>
                        FAQ
                    </h2>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item mb_30">
                            <h2 class="accordion-header" id="heading_1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">
                                    What is Child Support Charity?
                                </button>
                            </h2>
                            <div id="collapse_1" class="accordion-collapse collapse" aria-labelledby="heading_1" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Child Support Charity is a nonprofit organization dedicated to providing assistance and support to underprivileged children and their families. Our mission is to improve the lives of children by offering various forms of aid and opportunities for a brighter future.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb_30">
                            <h2 class="accordion-header" id="heading_2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_2" aria-expanded="false" aria-controls="collapse_2">
                                    How can I get involved with Child Support Charity?
                                </button>
                            </h2>
                            <div id="collapse_2" class="accordion-collapse collapse" aria-labelledby="heading_2" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    You can get involved with Child Support Charity in several ways, such as making a donation, volunteering your time and skills, or spreading awareness about our cause. Visit our website or contact us to learn more about how you can contribute.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb_30">
                            <h2 class="accordion-header" id="heading_3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_3" aria-expanded="false" aria-controls="collapse_3">
                                    Where does the money donated to Child Support Charity go?
                                </button>
                            </h2>
                            <div id="collapse_3" class="accordion-collapse collapse" aria-labelledby="heading_3" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Donations to Child Support Charity go towards funding various programs and initiatives aimed at improving the lives of children in need. This includes providing education, healthcare, food, clothing, and other essential support services.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb_30">
                            <h2 class="accordion-header" id="heading_4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                    Can I make a one-time donation, or do you offer recurring donation options?
                                </button>
                            </h2>
                            <div id="collapse_4" class="accordion-collapse collapse" aria-labelledby="heading_4" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    You can choose to make a one-time donation or set up recurring donations, depending on your preference and financial capacity. Recurring donations provide consistent support for our ongoing projects.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb_30">
                            <h2 class="accordion-header" id="heading_5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
                                    Are my donations tax-deductible?
                                </button>
                            </h2>
                            <div id="collapse_5" class="accordion-collapse collapse" aria-labelledby="heading_5" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Child Support Charity is a registered nonprofit organization, and donations are often tax-deductible. Please consult with a tax professional or refer to local tax regulations for specific information about deductibility in your area.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="right-item">
                    <h2>Donate Now</h2>
                    <form action="" method="post">
                        <div class="donate-sec">
                            <h3>How much would you like to donate?</h3>
                            <div class="donate-box">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" id="donation-amount" required>
                                </div>
                            </div>
                            <h3>Select an Amount:</h3>
                            <div class="donate-select">
                                <ul>
                                    <li>
                                        <button type="button" class="btn btn-primary donation-button" data-amount="10">$10</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-primary donation-button" data-amount="25">$25</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-primary donation-button selected" data-amount="50">$50</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-primary donation-button" data-amount="100">$100</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-primary donation-button" data-amount="">Custom</button>
                                    </li>
                                </ul>
                            </div>
                            <h3>Select Payment Method:</h3>
                            <div class="form-control">
                                <select name="" class="form-select">
                                    <option value="PayPal">PayPal</option>
                                    <option value="Stripe">Stripe</option>
                                    <option value="Direct Bank Transfer">Direct Bank Transfer</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger w-100-p donate-now">Donate Now</button>
                        </div>
                    </form>
                    <h2 class="mt_30">Information</h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Goal</b></td>
                                    <td>${{ $campaign->goal }}</td>
                                </tr>
                                <tr>
                                    <td><b>Raised</b></td>
                                    <td>${{ $campaign->raised }}</td>
                                </tr>
                                <tr>
                                    <td><b>Remaining</b></td>
                                    <td>${{ ($campaign->goal - $campaign->raised) }}</td>
                                </tr>
                                <tr>
                                    <td><b>Percentage</b></td>
                                    @php
                                    $percentage = ($campaign->raised/$campaign->goal)*100;
                                    $percentage = ceil($percentage);
                                    @endphp
                                    <td>{{ $percentage }}%</td>
                                </tr>
                                <tr>
                                    <td><b>Total Persons Donated</b></td>
                                    <td>0000</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <h2 class="mt_30">Recent Causes</h2>
                    <ul>
                        @foreach ($recent_campaigns as $item)
                        <li><a href="{{ route('campaign', $item->slug) }}"><i class="fas fa-angle-right"></i> {{ $item->name }}</a></li>
                        @endforeach
                    </ul>


                    <h2 class="mt_30">Cause Enquery</h2>
                    <div class="enquery-form">
                        <form action="{{ route('campaign_send_message') }}" method="post">
                            @csrf
                            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                        
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Full Name" required />
                            </div>
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email Address" required/>
                            </div>
                            <div class="mb-3">
                                <input name="phone" type="text" class="form-control" placeholder="Phone Number (Optional)"/>
                            </div>
                            <div class="mb-3">
                                <textarea name="message" class="form-control h-150" rows="3" placeholder="Message" required></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    Send Message <i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $("#donation-amount").val("50");
    $(".donation-button").on('click',function () {
        $(".donation-button").removeClass("selected");
        var amount = $(this).data("amount");
        $("#donation-amount").val(amount);
        $(this).addClass("selected");
        if (amount === "") {
            $("#donation-amount").focus();
        }
    });
});
</script>
@endsection
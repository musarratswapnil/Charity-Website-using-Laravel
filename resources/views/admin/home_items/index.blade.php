@extends('admin.layout.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Home Items</h1>
        </div>
        <form action="{{ route('admin_home_item_update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="section-body">
                <div class="row">


                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        
                                        <button class="nav-link active" id="i1-tab" data-bs-toggle="tab" data-bs-target="#i1" type="button" role="tab" aria-controls="i1" aria-selected="true">Campaigns</button>
                                        
                                        <button class="nav-link" id="i3-tab" data-bs-toggle="tab" data-bs-target="#i3" type="button" role="tab" aria-controls="i3" aria-selected="false">Events</button>

                                        

                                        {{-- <button class="nav-link" id="i5-tab" data-bs-toggle="tab" data-bs-target="#i5" type="button" role="tab" aria-controls="i5" aria-selected="false">Blog</button> --}}
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="i1" role="tabpanel" aria-labelledby="i1-tab" tabindex="0">
                                        <!-- Campaign - Start -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Heading</label>
                                                    <input type="text" name="campaign_heading" class="form-control" value="{{ $home_item->campaign_heading }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>SubHeading</label>
                                                    <input type="text" name="campaign_subheading" class="form-control" value="{{ $home_item->campaign_subheading }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Status *</label>
                                                    <select name="campaign_status" class="form-select">
                                                        <option value="Show" @if($home_item->campaign_status == 'Show') selected @endif>Show</option>
                                                        <option value="Hide" @if($home_item->campaign_status == 'Hide') selected @endif>Hide</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Campaign - End -->
                                    </div>
                                    <div class="tab-pane fade" id="i3" role="tabpanel" aria-labelledby="i3-tab" tabindex="0">
                                        <!-- Event - Start -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Heading</label>
                                                    <input type="text" name="event_heading" class="form-control" value="{{ $home_item->event_heading }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>SubHeading</label>
                                                    <input type="text" name="event_subheading" class="form-control" value="{{ $home_item->event_subheading }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Status *</label>
                                                    <select name="event_status" class="form-select">
                                                        <option value="Show" @if($home_item->event_status == 'Show') selected @endif>Show</option>
                                                        <option value="Hide" @if($home_item->event_status == 'Hide') selected @endif>Hide</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Event - End -->
                                    </div>
                                    {{-- <div class="tab-pane fade" id="i5" role="tabpanel" aria-labelledby="i5-tab" tabindex="0">
                                        <!-- Blog - Start -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Heading</label>
                                                    <input type="text" name="blog_heading" class="form-control" value="{{ $home_item->blog_heading }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>SubHeading</label>
                                                    <input type="text" name="blog_subheading" class="form-control" value="{{ $home_item->blog_subheading }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Status *</label>
                                                    <select name="blog_status" class="form-select">
                                                        <option value="Show" @if($home_item->blog_status == 'Show') selected @endif>Show</option>
                                                        <option value="Hide" @if($home_item->blog_status == 'Hide') selected @endif>Hide</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Blog - End -->
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </section>
</div>
@endsection
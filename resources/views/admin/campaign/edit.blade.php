@extends('admin.layout.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1 class="text-primary">Edit Campaign</h1>
            
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_campaign_edit_submit', ['id' => $campaign->id]) }}"  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label>Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'. $campaign->featured_photo) }}" alt="" class="w_200">
                                    </div>
                                </div>   
                                <div class="form-group mb-3">
                                    <label>New Photo</label>
                                    <div>
                                        <input type="file" name="photo">
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ $campaign->name }}">
                                        </div> 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Slug*</label>
                                            <input type="text" class="form-control" name="slug" value="{{ $campaign->slug }}">
                                        </div> 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Goal</label>
                                            <input type="text" class="form-control" name="total_seat" value="{{ $campaign->goal }}">
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label>Short description*</label>
                                            <textarea class="form-control h_100" cols="30" rows="10" name="short_description">{{ $campaign->short_description }}</textarea>
                                        </div>
                                    </div>
                                </div>        

                                <div class="form-group mb-3">
                                    <label>Description*</label>
                                    <textarea class="form-control editor h_100" cols="30" rows="10" name="description">{{ $campaign->description }}</textarea>
                                </div>

                                                       
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
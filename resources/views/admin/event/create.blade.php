@extends('admin.layout.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1 class="text-primary">Add Event</h1>
            <div>
                <a href="{{ route('admin_event_create') }}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_event_create_submit') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Featured Photo*</label>
                                    <div>
                                        <input type="file" name="featured_photo">
                                    </div>
                                </div>   
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Name*</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Slug*</label>
                                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                        </div> 
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Location*</label>
                                            <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Date*</label>
                                            <input id="datepicker" type="text" class="form-control" name="date" value="{{ old('date') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Time*</label>
                                            <input id="timepicker" type="text"  class="form-control" name="time" value="{{ old('time') }}">
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Total Seat</label>
                                            <input type="text" class="form-control" name="total_seat" value="{{ old('total_seat') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Price*</label>
                                            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Map</label>
                                            <textarea class="form-control h_100" cols="30" rows="10" name="map" value="{{ old('map') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Short description*</label>
                                            <textarea class="form-control h_100" cols="30" rows="10" name="short_description" value="{{ old('short_description') }}"></textarea>
                                        </div>
                                    </div>
                                </div>        

                                <div class="form-group mb-3">
                                    <label>Description*</label>
                                    <textarea class="form-control editor h_100" cols="30" rows="10" name="description" value="{{ old('description') }}"></textarea>
                                </div>                                   

                                                        
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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


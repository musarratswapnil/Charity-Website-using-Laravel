@extends('admin.layout.app')


@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1 class="text-primary">Goals</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_goal_edit_submit', ['id' => $goal->id]) }}"  enctype="multipart/form-data">
                                @csrf
                                
                                        <div class="form-group mb-3">
                                            <label>Heading</label>
                                            <input type="text" class="form-control" name="heading" value="{{ $goal->heading }}">
                                        </div> 

                                    
                                    
                                        <div class="form-group mb-3">
                                            <label>Sub Heading</label>
                                            <input type="text" class="form-control" name="sub_heading" value="{{ $goal->sub_heading }}">
                                        </div> 
                                   
                                 
                                                                  
                                    
                                <div class="form-group mb-3">
                                    <label>Text</label>
                                    <textarea class="form-control editor" cols="30" rows="20" name="text">{{ $goal->text }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>Section Items</h4>
                            <form method="POST" action="{{ route('admin_goal_edit_photo_submit') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="">Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$goal->photo) }}" alt="" style="width:100%;">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Change Photo</label>
                                    <input type="file" name="photo">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status*</label>
                                    <select name="status" class="form-select">
                                        <option value="Show" @if($goal->status =='Show') selected @endif>Show</option>
                                        <option value="Hide" @if($goal->status =='Hide') selected @endif>Hide</option>
                                    </select>
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
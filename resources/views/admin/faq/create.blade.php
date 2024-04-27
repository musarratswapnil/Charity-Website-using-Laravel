@extends('admin.layout.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1 class="text-primary">Add FAQ</h1>
            <div>
                <a href="{{ route('admin_faq_create') }}" class="btn btn-primary">View All</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_faq_create_submit') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Question*</label>
                                    <input type="text" class="form-control" name="question" value="">
                                </div>                                   
                                    
                                <div class="form-group mb-3">
                                    <label>Answer*</label>
                                    <textarea  class="form-control h_200" cols="30" rows="20" name="answer" value=""></textarea>
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
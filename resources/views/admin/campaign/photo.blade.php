@extends('admin.layout.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1 class="text-primary">Campaign ({{ $campaign_single->name }}) Photo</h1>
            <div>
                <a href="{{ route('admin_campaign_index') }}" class="btn btn-primary">Back to Campaign</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_campaign_photo_submit', ['id' => $campaign_single->id]) }}"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="campaign_id" value="{{ $campaign_single->id }}">
                                <div class="form-group mb-3">
                                    <label>Select Photo</label>
                                    <div>
                                        <input type="file" name="photo">
                                    </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($campaign_photos as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('uploads/'. $item->photo) }}" alt="" class="w_200"></td>
                                            
                                            <td class="pt_10 pb_10">
                                                <a href="{{ Route('admin_campaign_photo_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
        
                                 </table>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
</div>

@endsection
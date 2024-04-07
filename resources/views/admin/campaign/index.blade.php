@extends('admin.layout.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1 class="text-primary">Campaigns</h1>
            <div>
                <a href="{{ route('admin_campaign_create') }}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Featured photo</th>
                                            <th>Name</th>
                                            <th>Goal</th>
                                            <th>Raised</th>
                                            <th>Options</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($campaigns as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('uploads/'. $item->featured_photo) }}" alt="" class="w_100"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->goal }}</td>
                                            
                                            <td>{{ $item->raised }}</td>
                                            <td>
                                                <a href="{{ route('admin_campaign_photo', $item->id) }}" class="btn btn-primary btn-sm mb_5">Photo Gallery</a><br>
                                                <a href="{{ route('admin_campaign_video', $item->id) }}" class="btn btn-success btn-sm">Video Gallery</a>
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ Route('admin_campaign_edit', $item->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ Route('admin_campaign_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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
        </div>
    </section>
</div>

@endsection
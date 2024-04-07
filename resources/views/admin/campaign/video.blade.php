@extends('admin.layout.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1 class="text-primary">Campaign ({{ $campaign_single->name }}) Video</h1>
            <div>
                <a href="{{ route('admin_campaign_index') }}" class="btn btn-primary">Back to Campaign</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_campaign_video_submit', ['id' => $campaign_single->id]) }}"  >
                                @csrf
                                <input type="hidden" name="campaign_id" value="{{ $campaign_single->id }}">
                                <div class="form-group mb-3">
                                    <label>YouTube Video ID</label>
                                    <div>
                                        <input type="text" name="youtube_video_link" required>
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
                                            <th>Video Preview</th>
                                            <th>Video Id</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($campaign_videos as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <iframe class="il" width="100" height="auto" src="https://www.youtube.com/embed/{{ $item->youtube_video_id }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </td>

                                            <td>
                                                {{ $item->youtube_video_id }}
                                            </td>
                                            
                                            <td class="pt_10 pb_10">
                                                <a href="{{ Route('admin_campaign_video_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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
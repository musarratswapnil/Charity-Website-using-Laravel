@extends('admin.layout.app')

@section('heading', 'Sliders')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1 class="text-primary">Slider</h1>
            <div>
                <a href="{{ route('admin_slider_create') }}" class="btn btn-primary">Add New</a>
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
                                            <th>Image</th>
                                            <th>Title</th>
                                            {{-- <th>Description</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('uploads/'. $slider->photo) }}" alt="" class="w_200"></td>
                                            <td>{{ $slider->heading }}</td>
                                            {{-- <td>{{ $slider->text }}</td> --}}
                                            <td class="pt_10 pb_10">
                                                <a href="{{ Route('admin_slider_edit', $slider->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ Route('admin_slider_delete', $slider->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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
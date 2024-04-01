@extends('admin.layout.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1 class="text-primary">Event</h1>
            <div>
                <a href="{{ route('admin_event_create') }}" class="btn btn-primary">Add New</a>
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
                                            <th>Name</th>
                                            <th>Date & Time</th>
                                            <th>Ticket Price</th>
                                            <th>Total Seat</th>
                                            <th>Booked Seat</th>
                                            <th>Gallery</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('uploads/'. $item->featured_photo) }}" alt="" class="w_100"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->date }} <br> {{ $item->time }}</td> <!-- Corrected Placement -->
                                            <td>{{ $item->price }}</td>
                                            
                                            <td>{{ $item->total_seat }}</td>
                                            <td>{{ $item->booked_seat }}</td>
                                            <td>
                                                <a href="{{ route('admin_event_photo', $item->id) }}" class="btn btn-primary btn-sm mb_5">Photo Gallery</a><br>
                                                <a href="{{ route('admin_event_video', $item->id) }}" class="btn btn-success btn-sm">Video Gallery</a>
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ Route('admin_event_edit', $item->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ Route('admin_event_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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
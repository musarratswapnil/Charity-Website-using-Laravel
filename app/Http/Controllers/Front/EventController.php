<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventPhoto;
use App\Models\EventVideo;
use App\Models\Admin;
use App\Mail\Websitemail;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('front.events', compact('events'));
    }

    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $event_photos = EventPhoto::where('event_id', $event->id)->get();
        $event_videos = EventVideo::where('event_id', $event->id)->get();
        $recent_events = Event::orderBy('id', 'desc')->take(5)->get();
        return view('front.event', compact('event', 'event_photos', 'event_videos', 'recent_events'));
    }

    public function send_message(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $admin_data = Admin::where('id', '1')->first();
        $admin_email = $admin_data->email;

        $event_data = Event::where('id', $request->event_id)->first();


        $subject = 'Message from visitor for Event: ' . $event_data->name;
        $message = 'Please click on the below link to reset your password: <br>';
        $message .= '<b>Visitor Information:</b> <br><br>';
        $message .= 'Name: ' . $request->name . '<br>';
        $message .= 'Email: ' . $request->email . '<br>';
        $message .= 'Phone: ' . $request->phone . '<br>';
        $message .= 'Message: ' . $request->message . '<br><br>';
        $message .= '<b>Event Page URL: </b><br>';
        $message .= '<a href="' . url('event/' . $event_data->slug) . '">' . url('event/' . $event_data->slug) . '</a>';

        \Mail::to($admin_email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}

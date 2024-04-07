<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignPhoto;
use App\Models\CampaignVideo;
use App\Models\Admin;
use App\Mail\Websitemail;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('front.campaigns', compact('campaigns'));
    }

    public function detail($slug)
{
    $campaign = Campaign::where('slug', $slug)->first();
    if (!$campaign) {
        // Return a 404 page or redirect with an error message
        abort(404, 'Campaign not found.');
    }
    $campaign_photos = CampaignPhoto::where('campaign_id', $campaign->id)->get();
    $campaign_videos = CampaignVideo::where('campaign_id', $campaign->id)->get();
    $recent_campaigns = Campaign::orderBy('id', 'desc')->limit(5)->get();
    return view('front.campaign', compact('campaign', 'campaign_photos', 'campaign_videos', 'recent_campaigns'));
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

        $campaign_data = Campaign::where('id', $request->campaign_id)->first();


        $subject = 'Message from visitor for Campaign: ' . $campaign_data->name;
        $message = 'Please click on the below link to reset your password: <br>';
        $message .= '<b>Visitor Information:</b> <br><br>';
        $message .= 'Name: ' . $request->name . '<br>';
        $message .= 'Email: ' . $request->email . '<br>';
        $message .= 'Phone: ' . $request->phone . '<br>';
        $message .= 'Message: ' . $request->message . '<br><br>';
        $message .= '<b>Campaign Page URL: </b><br>';
        $message .= '<a href="' . url('campaign/' . $campaign_data->slug) . '">' . url('campaign/' . $campaign_data->slug) . '</a>';

        \Mail::to($admin_email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}

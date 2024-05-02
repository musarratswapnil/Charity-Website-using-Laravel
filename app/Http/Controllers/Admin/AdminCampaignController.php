<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignPhoto;
use App\Models\CampaignVideo;
use App\Models\User;
use App\Models\CampaignDonation;

class AdminCampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('admin.campaign.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaign.create');
    }

    public function create_submit(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:campaigns'],
            'slug' => ['required', 'alpha_dash', 'unique:campaigns'],
            'goal' => ['required', 'numeric', 'min:1'],
            'short_description' => 'required',
            'description' => 'required',
            'featured_photo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $obj = new Campaign();
        $obj->name = $request->name;
        $obj->slug = strtolower($request->slug);;
        $obj->goal = $request->goal;
        $obj->raised=0;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $final_name = 'campaign_featured_photo' . time() . '.' . $request->featured_photo->extension();
        $request->featured_photo->move(public_path('uploads'), $final_name);
        $obj->featured_photo = $final_name;
        $obj->save();

        return redirect()->route('admin_campaign_index')->with('success', 'Campaign created successfully');
    }

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.campaign.edit', compact('campaign'));
    }

    public function edit_submit(Request $request, $id)
    {
        $request->validate([
            
            'name' => ['required', 'unique:campaigns,name,' . $id],
            'slug' => ['required', 'alpha_dash', 'unique:campaigns,slug,' . $id],
            'goal' => ['required', 'numeric', 'min:1'],
            'short_description' => 'required',
            'description' => 'required',


        ]);

        $obj = Campaign::findOrFail($id);

        if ($request->featured_photo != null) {
            $request->validate([
                'featured_photo' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            unlink(public_path('uploads/' . $obj->featured_photo));

            $final_name = 'campaign_featured_photo' . time() . '.' . $request->featured_photo->extension();
            $request->featured_photo->move(public_path('uploads'), $final_name);
            $obj->featured_photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->slug = strtolower($request->slug);
        $obj->goal = $request->goal;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->update();

        return redirect()->back()->with('success', 'campaign updated successfully');
    }

    public function delete($id)
    {
        $campaign = Campaign::findOrFail($id);
        unlink(public_path('uploads/' . $campaign->featured_photo));
        $campaign->delete();
        return redirect()->back()->with('success', 'campaign deleted successfully');
    }

    public function photo($id)
    {
        $campaign_single = Campaign::findOrFail($id);
        $campaign_photos = CampaignPhoto::where('campaign_id', $id)->get();
        return view('admin.campaign.photo', compact('campaign_single', 'campaign_photos'));
    }


    public function photo_submit(Request $request, $id)
    {
        $request->validate([
            'campaign_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $obj = new CampaignPhoto();
        $obj->campaign_id = $id;
        $final_name = 'campaign_photo' . time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $obj->photo = $final_name;
        $obj->save();

        return redirect()->back()->with('success', 'Campaign photo added successfully');
    }

    public function photo_delete(Request $request, $id)
    {
    

        $campaign_photo = CampaignPhoto::findOrFail($id);
        unlink(public_path('uploads/' . $campaign_photo->photo));
        $campaign_photo->delete();
        return redirect()->back()->with('success', 'Campaign photo deleted successfully');
    }

    public function video($id)
    {
        $campaign_single = Campaign::findOrFail($id);
        $campaign_videos = CampaignVideo::where('campaign_id', $id)->get();
        return view('admin.campaign.video', compact('campaign_single', 'campaign_videos'));
    }

    public function video_submit(Request $request, $id)
    {
        $request->validate([
            'campaign_id' => 'required',
            'youtube_video_link' => 'required',
        ]);

        $obj = new CampaignVideo();
        $obj->campaign_id = $id;
        $obj->youtube_video_link = $request->youtube_video_link;
        $obj->save();

        return redirect()->back()->with('success', 'Campaign video added successfully');
    }

    public function video_delete($id)
    {
        $campaign_video = CampaignVideo::findOrFail($id);
        $campaign_video->delete();
        return redirect()->back()->with('success', 'Campaign video deleted successfully');
    }

    public function donations($id)
    {
        $campaign_single = Campaign::findOrFail($id);
        $donations = CampaignDonation::where('campaign_id', $id)->where('payment_status', 'COMPLETED')->get();
        return view('admin.campaign.donations', compact('campaign_single', 'donations'));
    }

    public function donation_invoice($id)
    {
        $donation_data = CampaignDonation::findOrFail($id);
        $user_data = User::findOrFail($donation_data->user_id);
        return view('admin.campaign.invoice', compact('donation_data', 'user_data'));
    }
}

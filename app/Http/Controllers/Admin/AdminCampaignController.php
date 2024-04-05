<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

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
        $obj->slug = $request->slug;
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
            'price' => ['required', 'numeric', 'min:1'],
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
        $obj->slug = $request->slug;
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
}

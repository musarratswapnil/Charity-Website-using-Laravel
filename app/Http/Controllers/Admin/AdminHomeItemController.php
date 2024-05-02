<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeItem;

class AdminHomeItemController extends Controller
{
    public function index()
    {
        $home_item = HomeItem::where('id',1)->first();
        return view('admin.home_items.index', compact('home_item'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'campaign_heading' => 'required',
            'campaign_subheading' => 'required',
            'campaign_status' => 'required',

            'event_heading' => 'required',
            'event_subheading' => 'required',
            'event_status' => 'required',

            // 'blog_heading' => 'required',
            // 'blog_subheading' => 'required',
            // 'blog_status' => 'required',
        ]);
        $home_item = HomeItem::where('id',1)->first();

        $home_item->campaign_heading = $request->campaign_heading;
        $home_item->campaign_subheading = $request->campaign_subheading;
        $home_item->campaign_status = $request->campaign_status;

        $home_item->event_heading = $request->event_heading;
        $home_item->event_subheading = $request->event_subheading;
        $home_item->event_status = $request->event_status;

        // $home_item->blog_heading = $request->blog_heading;
        // $home_item->blog_subheading = $request->blog_subheading;
        // $home_item->blog_status = $request->blog_status;

        $home_item->update();

        return redirect()->back()->with('success','Home Item updated successfully');
    }
}

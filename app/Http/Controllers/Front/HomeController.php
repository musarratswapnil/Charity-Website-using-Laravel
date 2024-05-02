<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Mission;
use App\Models\Feature;
use App\Models\FeatureSectionItem;
use App\Models\Event;
use App\Models\HomeItem;
use App\Models\Campaign;
use App\Models\Goal;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        $mission=Mission::where('id', 1)->first();
        $features = Feature::get();
        $feature_section_items=FeatureSectionItem::where('id', 1)->first();
        // $featured_campaigns = Campaign::where('is_featured','Yes')->get();
        $events = Event::take(3)->get();
        $home_item = HomeItem::where('id', 1)->first();
        $campaigns=Campaign::orderBy('id','desc')->take(3)->get();
        $goal=Goal::first();
        return view('front.home', compact('slider', 'mission', 'features', 'feature_section_items', 'events', 'campaigns','home_item', 'goal'));
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Mission;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        $mission=Mission::where('id', 1)->first();
        return view('front.home', compact('slider', 'mission'));
    }
}

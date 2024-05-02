<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Event;
use App\Models\User;

class AdminHomeController extends Controller
{
    public function index()
    {   
        $total_campaigns = Campaign::count();
        $total_events = Event::count();
        $total_users = User::count();
        return view('admin.home', compact('total_campaigns', 'total_events', 'total_users'));
    }
}

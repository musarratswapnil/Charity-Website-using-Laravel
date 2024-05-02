<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventTicket;
use Auth;
use App\Models\CampaignDonation;

class CustomerHomeController extends Controller
{
    public function index()
    {
        return view('customer.home');
    }

    public function tickets()
    {
        $event_tickets = EventTicket::where('user_id',  Auth::guard('customer')->user()->id)->where('payment_status', 'COMPLETED')->get();
        return view('customer.event.tickets', compact('event_tickets'));
    }

    public function ticket_invoice($id)
    {
        $ticket_data = EventTicket::findOrFail($id);
        return view('customer.event.invoice', compact('ticket_data'));
    }


    public function donations()
    {
        $donations = CampaignDonation::where('user_id',  Auth::guard('customer')->user()->id)->where('payment_status', 'COMPLETED')->get();
        return view('customer.campaign.donations', compact('donations'));
    }

    public function donation_invoice($id)
    {
        $donation_data = CampaignDonation::findOrFail($id);
        return view('customer.campaign.invoice', compact('donation_data'));
    }
}

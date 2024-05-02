<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventTicket;
use Auth;
use App\Models\CampaignDonation;
use App\Models\User;


class CustomerHomeController extends Controller
{
    public function index()
    {   
        $total_ticket = 0;
        $total_ticket_price = 0;
        $event_ticket_data = EventTicket::where('user_id',auth()->user()->id)->get();
        foreach($event_ticket_data as $item) {
            $total_ticket += $item->number_of_tickets;
            $total_ticket_price += $item->total_price;
        }


        $total_donation_price = 0;
        $donation_data = CampaignDonation::where('user_id',auth()->user()->id)->get();
        foreach($donation_data as $item) {
            $total_donation_price += $item->price;
        }


        return view('customer.home', compact('total_ticket', 'total_ticket_price', 'total_donation_price'));
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

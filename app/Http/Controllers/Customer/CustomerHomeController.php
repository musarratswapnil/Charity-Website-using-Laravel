<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventTicket;
use Auth;

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


    // public function donations()
    // {
    //     $donations = CauseDonation::where('user_id', auth()->user()->id)->where('payment_status', 'COMPLETED')->get();
    //     return view('user.cause.donations', compact('donations'));
    // }

    // public function donation_invoice($id)
    // {
    //     $donation_data = CauseDonation::findOrFail($id);
    //     return view('user.cause.invoice', compact('donation_data'));
    // }
}

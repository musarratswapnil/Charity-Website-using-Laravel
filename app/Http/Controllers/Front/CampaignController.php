<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignPhoto;
use App\Models\CampaignVideo;
use App\Models\Admin;
use App\Mail\Websitemail;
use Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\User;
use App\Models\CampaignDonation;

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

    public function payment(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer_login');
        }

        $request->validate([
            'price' => ['required', 'numeric', 'min:1'],
            'payment_method' => 'required'
        ]);

        $campaign_data = Campaign::where('id',$request->campaign_id)->first();
        $needed_amount = $campaign_data->goal - $campaign_data->raised;

        if($request->price > $needed_amount) {
            return redirect()->back()->with('error','You can not donate more than needed amount');
        }

        if($request->payment_method == 'paypal') {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('donation_paypal_success'),
                    "cancel_url" => route('donation_cancel')
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $request->price
                        ]
                    ]
                ]
            ]);
            //dd($response);
            if(isset($response['id']) && $response['id']!=null) {
                foreach($response['links'] as $link) {
                    if($link['rel'] === 'approve') {
                        session()->put('campaign_id', $request->campaign_id);
                        session()->put('price', $request->price);
                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('donation_cancel');
            }
        }

    }


    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);
        if(isset($response['status']) && $response['status'] == 'COMPLETED') {
            
            // Insert data into database
            $obj = new CampaignDonation;
            $obj->campaign_id = session()->get('campaign_id');
            $obj->user_id = Auth::guard('customer')->user()->id;
            $obj->price = session()->get('price');
            $obj->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $obj->payment_id = $response['id'];
            $obj->payment_method = "PayPal";
            $obj->payment_status = $response['status'];
            $obj->save();

            $campaign_data = Campaign::where('id',session()->get('campaign_id'))->first();
            $campaign_data->raised = $campaign_data->raised + session()->get('price');
            $campaign_data->update();

            unset($_SESSION['campaign_id']);
            unset($_SESSION['price']);

            return redirect()->route('campaign',$campaign_data->slug)->with('success','Payment completed successfully');

        } else {
            return redirect()->route('donation_cancel');
        }
    }


    public function cancel()
    {
        return redirect()->route('home')->with('error','Payment is cancelled');
    }
}

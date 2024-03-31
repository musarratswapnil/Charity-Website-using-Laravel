<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\Websitemail;
use Hash;
use Auth;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('customer')->attempt($credential)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('customer_login')->with('error', 'Incorrect Email or Password!');
        }
    }

    public function signup()
    {
        return view('front.signup');
    }

    public function signup_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        $token = hash('sha256', time());
        $password = Hash::make($request->password);
        $verification_link = url('signup-verify/' . $request->email . '/' . $token);
        

        $obj = new Customer();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $password;
        $obj->token = $token;
        $obj->save();

        $subject = 'Sign Up Verification';
        $message = 'Click the link below to verify your email<br>';
        $message .= '<a href="' . $verification_link . '">';
        $message .= $verification_link;
        $message .= '</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $message));


        return redirect()->back()->with('success', 'Check your email to complete verification!');
    }

    public function signup_verify($email, $token)
    {
        $customer_data=Customer::where('email',$email)->where('token',$token)->first();
        if($customer_data)
        {
            $customer_data->token='';
            $customer_data->status=1;
            $customer_data->update();
            return redirect()->route('customer_login')->with('success','Email Verified Successfully!');
        }
        else
        {
            return redirect()->route('customer_login')->with('error','Invalid Request!');
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login');
    }

    public function forget_password()
    {
        return view('front.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $customer_data = Customer::where('email', $request->email)->first();
        if (!$customer_data) {
            return redirect()->back()->with('error', 'Invalid Email!');
        }

        $token = hash('sha256', time());

        $customer_data->token = $token;
        $customer_data->update();

        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the below link to reset your password: <br>';
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('customer_login')->with('success', 'Check your email to reset password!');
    }

    public function reset_password($token, $email)
    {
        $customer_data = Customer::where('token', $token)->where('email', $email)->first();
        if (!$customer_data) {
            return redirect()->route('customer_login');
        }

        return view('front.reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {    
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        
        $customer_data=Customer::where('token', $request->token)->where('email', $request->email)->first();

        $customer_data->password=Hash::make($request->password);
        $customer_data->token='';
        $customer_data->update();

        return redirect()->route('customer_login')->with('success', 'Password reset successfully!');
    }
}


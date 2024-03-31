<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Hash;

class CustomerProfileController extends Controller
{
    public function index()
    {
        return view('customer.profile');
    }

    public function profile_submit(Request $request)
    {
        $customer_data = Customer::where('email', Auth::guard('customer')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($request->password != '') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);

            $customer_data->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,png,gif'
            ]);

            if ($customer_data->photo != NULL) {
                unlink(public_path('uploads/' . $customer_data->photo));
            }


            $ext = $request->file('photo')->extension();
            $final_name = time() . '.' . $ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $customer_data->photo = $final_name;
        }


        $customer_data->name = $request->name;
        $customer_data->email = $request->email;
        $customer_data->phone = $request->phone;
        $customer_data->country = $request->country;
        $customer_data->address = $request->address;
        $customer_data->update();

        return redirect()->back()->with('success', 'Profile updated successfully!.');
    }
}

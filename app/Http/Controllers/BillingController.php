<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Billing;
use App;

class BillingController extends Controller
{
    public function show($lang = null)
    {
    	$billing = Auth::user()->billing;
        App::setlocale($lang);
    	return view('user.billingInfo', compact('billing'));
    }

    public function update(Request $request)
    {

        $first_name   = $request->first_name;
        $last_name    = $request->last_name;
        $email        = $request->email;
        $mobile       = $request->mobile;
        $address_1    = $request->address_1;
        $address_2    = $request->address_2;
        $city         = $request->city;
        $state        = $request->state;
        $country      = $request->country;
        $postal_code  = $request->postal_code;
        $type         = $request->type;
        $user_id      = Auth::id();
        $billing      = Billing::updateOrCreate(['user_id' => $user_id], 
        	[  
        		'user_id'     => $user_id,
        		'first_name'  => $first_name, 
        		'last_name'   => $last_name,
        		'email'       => $email,  
        		'mobile'      => $mobile, 
        		'address_1'   => $address_1, 
        		'address_2'   => $address_2, 
        		'city'        => $city, 
        		'state'       => $state, 
        		'country'     => $country,
        		'postal_code' => $postal_code,
        		'type'        => $type, 
        	]);

        $billing->save();
        return back()->with('message', 'Your company information are updated!');
    }
}

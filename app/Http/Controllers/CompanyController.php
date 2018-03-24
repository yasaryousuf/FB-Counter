<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;

class CompanyController extends Controller
{
    public function edit()
    {
        $company = Auth::user()->company;        
        return view('user.company', compact('company'));
    }

    public function update(Request $request)
    {
        $this->companyValidation($request);

        $name        = $request->company_name;
        $address_one = $request->company_address_one;
        $address_two = $request->company_address_two;
        $website     = $request->company_website;
        $city        = $request->company_city;
        $state       = $request->company_state;
        $country     = $request->company_country ;
        $user_id     = Auth::id();
        $company     = Company::updateOrCreate(['user_id' => $user_id], [ 'user_id' => $user_id, 'name' => $name, 'website' => $website, 'address_one' => $address_one, 'address_two' => $address_two, 'city' => $city, 'state' => $state, 'country' => $country]);
        $company->save();
        return back()->with('message', 'Your company information are updated!');
    }
    
    public function companyValidation($request)
    {
        $request->validate([
            'company_name'        => 'max:100',
            'company_website'     => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'company_city'        => 'max:100',
            'company_state'       => 'max:100',
        ]);
    }
}

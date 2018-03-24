<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class PlansController extends Controller
{
    public function index()
    {
        return view('plans.index')->with(['plans' => Plan::get()]);
    }

    public function show()
    {
    	$plan = Plan::where('slug', 'pro')->first();
        return view('general.orderForm')->with(['plan' => $plan]);
    }
}

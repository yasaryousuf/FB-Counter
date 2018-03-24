<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\User;
use App\Role;
use Auth;
use DB;

class SubscriptionsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $status = false;
        if ($user->subscribedToPlan('7t8m', 'main')) {
            $status = true;
        }
        return view('user.subscription', compact('status'));
    }

    public function store(Request $request)
    {
        $plan = Plan::findOrFail($request->plan);
        $request->user()->newSubscription('main', $plan->braintree_plan)->trialDays(30)->create($request->payment_method_nonce);
        $user = User::find(Auth::id());
        if (!Auth::user()->is('Admin')) {
            $user->roles()->sync(2);
        }
        
        return redirect('/my-account')->with('message', 'Payment is successfull');
    }

    public function cancel()
    {
        $user = User::find(Auth::id());
        $user->subscription('main')->cancel();
        return back()->with('message', 'Your subscription is cancelled');
    }


    public function change($plan_id)
    {
        // dd($plan_id);
        $user = User::find(Auth::id());
        $user->subscription('main')->swap($plan_id);
        return back()->with('message', 'Subscription plan changed.');
    }


    public function update($stripeToken)
    {
        $user = User::find(Auth::id());
        $user->updateCard($stripeToken);
        return back()->with('message', 'Your subscription is cancelled');
    }

    public function test()
    {
        $user = User::find(Auth::id());

        var_dump($user->subscribed('main'));
        var_dump($user->subscribedToPlan('7t8m', 'main'));
    }


    public function resume()
    {
        $user = User::find(Auth::id());
        if ($user->subscription('main')->onGracePeriod()) {
            $user->subscription('main')->resume();
            return back()->with('message', 'Your subscription is resumed');
        }
        return back()->with('message', 'You can\'t resume subscription');
    }

    public function invoice()
    {
        $user = User::find(Auth::id());
        $invoices = $user->invoicesIncludingPending();
        dd($invoices);
        return $invoices;
        return view('user.invoice', compact('invoices'));
    }
}

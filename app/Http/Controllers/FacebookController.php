<?php

namespace App\Http\Controllers;

use App\FbToken;
use App\User;
use Auth;
use Facebook;
use App\Custom\CounterFacebook;

class FacebookController extends Controller
{
    public function create()
    {
        $CounterFacebook = new CounterFacebook;
        $loginUrl = $CounterFacebook->getUserToken();

        return redirect('/my-account')->with('message', 'Your account is authorized with Facebook!');
    }
}

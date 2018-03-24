<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use MailChimp;
use \DrewM\MailChimp\MailChimp;

class MailChimpController extends Controller
{
    // public $MailChimpAPI = env('MAILCHIMP_API_KEY');
    // $MailChimp = new MailChimp('7c6c3ea239a2fe19be6536a96407d211-us12');
    
    public function subscribe(Request $request)
    {
        $MailChimp = new MailChimp('7c6c3ea239a2fe19be6536a96407d211-us12');
        $list_id = '280592bb0a';

        $this->validateEmail($request);
       // $result = $MailChimp->get("lists");
        $result = $MailChimp->post("lists/$list_id/members", [
                        'email_address' => $request->email,
                        'status'        => 'subscribed',
                    ]);

        echo "<pre>";
        print_r($result);
        echo "</pre>";

        if ($MailChimp->success()) {
            print_r($result);
        } else {
            echo $MailChimp->getLastError();
        }
    }
    
    public function validateEmail($request)
    {
        $request->validate([
            'email'   => 'required|max:255|email',
        ]);
    }
}

<?php

namespace App;

use Braintree_ClientToken;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public static function token()
    {
        return response()->json([
            'data' => [
                'token' => Braintree_ClientToken::generate(),
            ]
        ]);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'mobile', 'type', 'address_1', 'address_2', 'city', 'state', 'country', 'postal_code', 'user_id'
    ];
}

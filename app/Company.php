<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'website', 'address_one', 'address_two', 'city', 'state', 'country', 'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

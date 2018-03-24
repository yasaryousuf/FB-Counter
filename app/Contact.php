<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = ['name', 'email', 'subject', 'text'];
    
    protected $dates = [
        'created_at', 'updated_at'
    ];
}

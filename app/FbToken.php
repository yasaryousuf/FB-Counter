<?php

namespace App;

use Facebook;
use Illuminate\Database\Eloquent\Model;

class FbToken extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

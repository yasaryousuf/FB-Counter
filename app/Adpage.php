<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\User;
use Facebook;

class Adpage extends Model
{
    protected $fillable = ['user_id', 'media', 'advertise_name', 'advertise_id', 'type'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function banner()
    {
        return $this->hasOne('App\Banner');
    }
    
    public static function page_names()
    {
        $user_id = Auth::id();
        $page_names = \App\Adpage::where('user_id', $user_id)->get();
        return $page_names;
    }
}

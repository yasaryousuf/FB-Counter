<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'username', 'password', 'image_url'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dates = [
        'trial_ends_at', 'expired_at', 'login_at', 'created_at'
    ];

    public function company()
    {
        return $this->hasOne('App\Company');
    }

    public function page()
    {
        return $this->hasOne('App\Adpage');
    }

    public function billing()
    {
        return $this->hasOne('App\Billing');
    }

    public function token()
    {
        return $this->hasOne('App\FbToken');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                 abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
             abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function isSubscriber()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Subscriber')
            {
                return true;
            }
        }
    }

    public function is($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }
}

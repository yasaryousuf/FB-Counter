<?php

namespace App\Http\Controllers\Authentication;

use Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;
    // public function username(Request $request)
    // {
    //     if ($usernames = \App\User::where('username', $request->username)->exists()) {
    //         echo "username_found";
    //     } else {
    //         echo "username_available";
    //     }
    // }

    public function email($request)
    {
        echo "called";
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['error' => 'invalid_email'], 200);
        }

        if ($emails = \App\User::where('email', $request->email)->exists()) {
            return response()->json(['error' => 'email_duplicate'], 200);
        } 

        return "ok";

        // else {
        //     echo "email_available";
        // }
    }

    public function isExist($email)
    {
        return \App\User::where('email', $email)->exists();
    }


    public function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function registration(Request $request)
    {
         $this->validator($request->all())->validate();


        if(!$this->isValidEmail($request->email)){

            return response()->json(['status' => false, 'msg' => "Invalid Email"], 200);
        }

        if($this->isExist($request->email)){
            return response()->json(['status' => false, 'msg' => "Already Exist"], 200);
        }


        $user = $this->create($request->all());

        $this->guard()->login($user);
        return response()->json(['status' => true, 'msg' => "Successfully registered"], 200);


        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:30',
            'last_name'  => 'required|string|max:30',
            'email'      => 'required|string|email|max:50|unique:users',
            'password'   => 'required|string|min:6'
        ]);
    }

    protected function create(array $data)
    {
        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        
        $user->roles()->attach(Role::where('name', 'Subscriber')->first());
        return $user;
    }

    protected function guard()
    {
        return Auth::guard();
    }
}

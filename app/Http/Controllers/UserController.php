<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App;

class UserController extends Controller
{
    public function edit($lang = null)
    {
        $user = Auth::user();
        App::setlocale($lang);
        return view('user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $this->userValidation($request);
        
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->image_url = "profile.jpg";

        if ($request->hasFile('user_image_url')) {
            $image = $request->file('user_image_url');
            $image_url = time().$image->getClientOriginalName();
            $destinationPath = public_path('/profile-images');
            $image->move($destinationPath, $image_url);
            $user->image_url = $image_url;
        }

        $user->save();
        return redirect('/my-account/profile')->with('message', 'Your information are updated!');
    }

    public function userValidation($request)
    {
        $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|max:50',
            'user_image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000'
        ]);
    }

    public function index()
    {
        $users = DB::table('users')->paginate(15);
        return view('admin.user', ['users' => $users]);
    }



    public function viewAsUser($id)
    {
        Auth::logout();
        $user = User::findOrFail($id);
        Auth::loginUsingId($user->id);
        return redirect('/my-account');
    }
}

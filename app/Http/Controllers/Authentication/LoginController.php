<?php

namespace App\Http\Controllers\Authentication;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = \App\User::where('email', $request->email)->first();
            Auth::user()->login_at = new DateTime();
            Auth::user()->save();
            // if ($user) {
            //     return $this->guard()->attempt(
                // Auth::login($user);
            $this->guard('web')->login($user);
                 return response()->json([
                    'status'  => true,
                    'message'    => '',
                ]);

            }
            else {
                 return response()->json([
                    'status'  => false,
                    'message'    => 'Credentials doesn\'t match',
                ]);
            }
    }
    // use RedirectsUsers, ThrottlesLogins;

    // public function login(Request $request)
    // {
    //     $this->validateLogin($request);

    //     if ($this->hasTooManyLoginAttempts($request)) {
    //         $this->fireLockoutEvent($request);

    //         return $this->sendLockoutResponse($request);
    //     } 

    //     if ($this->attemptLogin($request)) {
    //         return $this->sendLoginResponse($request);
    //     } 

    //     $this->incrementLoginAttempts($request);

    //     return $this->sendFailedLoginResponse($request);
    // }

    // protected function validateLogin(Request $request)
    // {
    //     $this->validate($request, [
    //         $this->username() => 'required|string',
    //         'password' => 'required|string',
    //     ]);
    // }

    // protected function attemptLogin(Request $request)
    // {
    //     return $this->guard()->attempt(
    //         $this->credentials($request),
    //         $request->filled('remember')
    //     );
    // }

    // protected function sendLoginResponse(Request $request)
    // {
    //     $request->session()->regenerate();

    //     $this->clearLoginAttempts($request);

    //     return $this->authenticated($request, $this->guard()->user())
    //             ?: redirect()->intended($this->redirectPath());
    // }

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     if ($request->ajax()) {
    //         return response()->json([
    //             'error' => Lang::get('auth.failed')
    //         ], 401);
    //     }
    //     return redirect()->back()
    //         ->withInput($request->only($this->username(), 'remember'))
    //         ->withErrors([
    //             $this->username() => Lang::get('auth.failed'),
    //         ]);
    //     // throw ValidationException::withMessages([
    //     //     $this->username() => [trans('auth.failed')],
    //     // ]);
    // }

    protected function guard()
    {
        return Auth::guard();
    }

    // public function username()
    // {
    //     return 'email';
    // }

    // protected function credentials(Request $request)
    // {
    //     return $request->only($this->username(), 'password');
    // }

    // protected function authenticated(Request $request, $user)
    // {
    //     // return response()->json([
    //     //         'status'   => false,
    //     //         'message'  => 'Your submitted credentials don\'t match our records' ,
    //     //     ]);
    // }
    
    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();

    //     $request->session()->invalidate();

    //     return redirect('/');
    // }
}

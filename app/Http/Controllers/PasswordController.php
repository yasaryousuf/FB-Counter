<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ForgetPassword;
use App\User;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\CanResetPassword;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use DB;
use Hash;
use Auth;

class PasswordController extends Controller
{
    public function forget(Request $request)
    {
        $this->validateEmail($request);
        $user = User::whereEmail($request->email)->first();

        if (!$user) {
            return back();
        }

        $mail = new PHPMailer(true);
        try {
            $token = str_random(64);
            DB::table('password_resets')->insert(['email' => $user->email, 'token' => $token, 'created_at' =>  \Carbon\Carbon::now()->toDateTimeString()]);
            $mail->setFrom('yousuf@opcodespace.com', 'Yasar Yousuf');
            $mail->Subject = "You requested for a password reset";
            $mail->MsgHTML("http://counter.linkingphase.com/password/reset/".$token);
            $mail->addAddress($request->email, $user->first_name);
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }

        return back()->with('message', 'Check your email!');
    }

    public function showResetForm($token)
    {
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        if (!$tokenData) {
            return redirect('/');
        }
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $tokenData->email]
        );
    }

    public function reset(Request $request)
    {
        $this->validator($request);

        $email    = $request->email;
        $password = $request->password;
        $token    = $request->token;
        $tokenData = DB::table('password_resets')->where([['token','=', $token],['email', '=', $email]])->first();
        if ($tokenData) {
            $user = User::where('email', $email)->first();
            if (!$user) {
                return back();
            }
            $user->password = Hash::make($password);
            $user->update();
            $this->guard()->login($user);
            DB::table('password_resets')->where('email', $user->email)->delete();
            return redirect('/my-account');
        }
        return redirect('/');
    }

    protected function validator($request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
    }
    
    protected function guard()
    {
        return Auth::guard();
    }
}

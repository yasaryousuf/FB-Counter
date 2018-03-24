<?php

namespace App\Http\Controllers;

use App\FbToken;
use App\User;
use App\Adpage;
use Auth;
use Facebook;
use Illuminate\Http\Request;
use App\Custom\CounterFacebook;

class HomeController extends Controller
{
    public function fbtest()
    {
        $CounterFacebook = new CounterFacebook;
        dd($CounterFacebook->getPermissions());
    }

    public function index()
    {
        return view('general.home');
    }

    public function orderForm()
    {
        return view('general.orderForm');
    }

    public function support()
    {
        return view('general.support');
    }

    public function TermsConditions()
    {
        return 'Terms & Conditions';
    }

    public function counter($slug)
    {
        $adpage = Adpage::where([
            ['advertise_name_slug', '=', $slug],
            ['user_id', '=', Auth::id()],
        ])->firstOrFail();

        $likes  = $this->getLikesBySlug($slug);
        session([$slug => $likes]);

        return view('user.counterWithAds', compact('likes', 'adpage'));
    }
        
    public function counterRefresh(Request $request)
    {
        $likes = $this->getLikesBySlug($request->slug);

        $status = false;
        if (session($request->slug) != $likes) {
            $status = true;
            session([$request->slug => $likes]);
        }

        return response()->json([
            'likes'  => $likes,
            'status' => $status,
        ]);
    }

    public function getLikesBySlug($slug)
    {
        $user = Auth::user();

        if (!$user->token) {
            abort(401, 'Facebook token not found. Please login with your facebook account.');
        }


        $adpage = Adpage::where([
            ['advertise_name_slug', '=', $slug],
            ['user_id', '=', $user->id],
        ])->firstOrFail();
        
        $CounterFacebook = new CounterFacebook;
        $likes = $CounterFacebook->getLikes($adpage->advertise_id);
        // session([$slug => $likes]);
        return $likes;
    }
}

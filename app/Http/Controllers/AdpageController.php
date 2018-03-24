<?php

namespace App\Http\Controllers;

use Auth;
use Facebook;
use App;
use App\Adpage;
use App\User;
use App\Banner;
use App\FbToken;
use Illuminate\Http\Request;
use App\Custom\CounterFacebook;
use App\Custom\Mailer;

class AdpageController extends Controller
{
    public function dashboard(Request $request)
    {
        $CounterFacebook = new CounterFacebook;
        $loginUrl = $CounterFacebook->getLoginUrl();
        // dd($loginUrl);
        $pages = $this->getPageNames();
        $adpages = Adpage::where('user_id', Auth::id())->get();

        return view('user.dashboard', compact('CounterFacebook', 'loginUrl', 'adpages', 'pages'));
    }

    public function index($lang = null)
    {
        $pages = $this->getPageNames();
        $user_id =  Auth::id();
        $adPages = Adpage::where('user_id', $user_id)->get();
        App::setlocale($lang);
        return view('user.settings', compact('adPages', 'pages'));
    }

    public function getPageNames()
    {
        $CounterFacebook = new CounterFacebook;
        $pageArray = json_decode($CounterFacebook->getPages(), true);
        $pages = $pageArray['data'];
        return $pages;
    }


    public function pageNameValidate($pageID)
    {
        $pages = $this->getPageNames();
        foreach ($pages as $page) {
            if (in_array($pageID, $page)) {
                $pageRow = array_search($pageID, array_column($pages, 'id'));
                return $pages[$pageRow]['name'];
            }
        }
        return false;
    }


    public function store(Request $request)
    {
        $this->validateAdpage($request);

        if ($request->adpage_id) {
            $adPage = Adpage::find($request->adpage_id);
        } else {
            $request->validate([
                'page_id'     => 'required|unique:adpages,advertise_id|not_in:Please select one option',
            ]);

            $page_name = $this->pageNameValidate($request->page_id);
            $adPage = new Adpage;
            $adPage->advertise_name = $page_name;
            $adPage->advertise_name_slug = str_slug($page_name);
            $adPage->advertise_id = $request->page_id;
            $this->addPageNotify();
        }

        $adPage->user_id = Auth::id();
        $adPage->save();

        if ($adPage->banner) {
            $banner = $adPage->banner;
        } else {
            $banner = new Banner;
        }

        $banner->adPage_id = $adPage->id;
        $banner->user_id   = Auth::id();

        if ($request->image_url_1) {
            $banner->image_url_1 = $this->getImageName($request, 'image_url_1');
        }
        if ($request->image_url_2) {
            $banner->image_url_2 = $this->getImageName($request, 'image_url_2');
        }

        $banner->save();
        return redirect('/my-account/settings')->with('message', 'Banner information saved!');
    }

    public function destroy($id)
    {
        $adPage = Adpage::find($id);
        $banner = Banner::where('adPage_id', $id)->firstOrFail();
        $image_url_1 = $banner->image_url_1;
        $image_url_2 = $banner->image_url_2;
        if (file_exists('image/'.$image_url_1) && $image_url_1!=null) {
            unlink('image/'.$image_url_1);
        }
        if (file_exists('image/'.$image_url_2) && $image_url_2!=null) {
            unlink('image/'.$image_url_2);
        }
        $adPage->delete();
        $banner->delete();
        return redirect('/my-account/settings')->with('message', 'Page information deleted!');
    }

    public function getImageName($request, $name)
    {
        if ($request->hasFile($name)) {
            $image_url = date('Y_m_d_H_i_s_').$request->$name->getClientOriginalName();
            $request->$name->move('image', $image_url);
            return $image_url;
        }
    }

    public function validateAdpage($request)
    {
        $request->validate([
            'image_url_1' => 'image|mimes:jpeg,png,jpg,gif|max:1000',
            'image_url_2' => 'image|mimes:jpeg,png,jpg,gif|max:1000',
        ]);
    }

    public function getPageInfo(Request $request)
    {
        $user_id = Auth::id();
        $adPage = Adpage::where([
            ['id', '=', $request->adpageid],
            ['user_id', '=', $user_id],
        ])->firstOrFail();

        $image_url_1 = "/image/default1.jpg";
        $image_url_2 = "/image/default2.jpg";

        if ($adPage->banner && $adPage->banner->image_url_1) {
            $image_url_1 = "/image/".$adPage->banner->image_url_1;
        }

        if ($adPage->banner && $adPage->banner->image_url_2) {
            $image_url_2 = "/image/".$adPage->banner->image_url_2;
        }

        return response()->json([
            'page_name'  => $adPage->advertise_name,
            'page_id'    => $adPage->advertise_id,
            'adpage_id'  => $adPage->id,
            'banner_one' => $image_url_1,
            'banner_two' => $image_url_2,
        ]);
    }

    public function addPageNotify()
    {
        $CounterFacebook = new CounterFacebook;
        $emailArray = json_decode($CounterFacebook->getEmail(), true);
        $email = $emailArray['email'];

        $mailer = new Mailer;
        $mail = $mailer->instance();
        $mail->Subject = "You successfully added a page on FB Counter.";
        $mail->MsgHTML("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.");
        $mail->addAddress($email, Auth::user()->first_name);
        $mail->send();
    }
}

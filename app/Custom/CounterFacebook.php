<?php 
namespace App\Custom;

use Facebook;
use App\User;
use Auth;
use App\FbToken;
use Log;

/**
*
*/
class CounterFacebook
{
    protected $Facebook;
    protected $helper;
    protected $permissions = ['email', 'pages_show_list'];

    public function __construct()
    {
        $arg = [
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => 'v2.2',
        ];
        if ($this->hasUserToken() && ! $this->hasUserTokenExpired()) {
            $arg['default_access_token'] = Auth::user()->token->accessToken;
        }

        $this->Facebook = new Facebook\Facebook($arg);
    }

    public function hasUserToken()
    {
        $user = Auth::user();
        if ($user->token && $user->token->accessToken) {
            return $user->token->accessToken;
        }
        return false;
    }

    public function hasUserTokenExpired()
    {
        $user      = Auth::user();
        if ($user->token && (strtotime($user->token->updated_at) < strtotime('-60 days'))) {
            return true;
        }

        return false;
    }

    public function redirectUrl()
    {
        return 'http://counter.linkingphase.com/fb-callback';
    }

    public function getUserToken()
    {
        $helper = $this->Facebook->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
            $helper->getPersistentDataHandler()->get('state');
        }
        try {
            $accessToken = $helper->getAccessToken('http://counter.linkingphase.com/fb-callback');
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            Log::info('Graph returned an error: ' . $e->getMessage());
            echo 'Graph returned an error'  . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            Log::info('Facebook SDK returned an error: ' . $e->getMessage());
            echo 'Facebook SDK returned an error';
            exit;
        }

        if (!isset($accessToken)) {
            if ($this->helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                Log::info('HTTP/1.0 401 Unauthorized \n' . "Error: " . $this->helper->getError() . "Error Code: " . $this->helper->getErrorCode() . "Error Reason: " . $this->helper->getErrorReason() . "Error Description: " . $this->helper->getErrorDescription());
                echo "Error: " . $this->helper->getError() . "\n";
                echo "Error Code: " . $this->helper->getErrorCode() . "\n";
                echo "Error Reason: " . $this->helper->getErrorReason() . "\n";
                echo "Error Description: " . $this->helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                Log::info('Bad Request');
                echo 'Bad request';
            }
            exit;
        }

        $oAuth2Client = $this->Facebook->getOAuth2Client();
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);

        $tokenMetadata->validateAppId(env('FACEBOOK_APP_ID'));
        $tokenMetadata->validateExpiration();
        if (!$accessToken->isLongLived()) {
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                Log::info('Error getting long-lived access token: ' . $this->helper->getMessage());
                echo "<p>Error getting long-lived access token: " . $this->helper->getMessage() . "</p>\n\n";
                exit;
            }
        }

        $user = User::find(Auth::id());
        $FbToken = $user->token;

        if (!$FbToken) {
            $FbToken = new FbToken;
        }

        $FbToken->user_id = $user->id;
        $FbToken->accessToken = $accessToken->getValue();
        $FbToken->metadata = serialize($tokenMetadata);
        $FbToken->save();

        return redirect('/my-account')->with('message', 'Your account is authorized with Facebook!');
    }

    public function helper()
    {
        $this->helper = $this->Facebook->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
            $this->helper->getPersistentDataHandler()->set('state', $_GET['state']);
            $this->helper->getPersistentDataHandler()->get('state');
        }
    }

    public function getLikes($page_id)
    {
        try {
            $response = $this->get(
                '/' . $page_id . '?fields=id,fan_count'
            );
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            return false;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            return false;
        }

        $likeArray = json_decode($response, true);
        $likes = $likeArray['fan_count'];
        return $likes;
    }

    public function get($endpoint)
    {
        try {
            $response = $this->Facebook->get($endpoint);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            return false;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            return false;
        }
    
        return $response->getBody();
    }

    public function post($endpoint, $data)
    {
        # code...
    }

    public function getPages()
    {
        return $this->get("me/accounts");
    }

    public function getEmail()
    {
        return $this->get("me?fields=email");
    }


    public function getPermissions()
    {
        return $this->get("me/permissions");
    }
    
    public function hasPermissions($permissionName)
    {
        $permissions = $this->getPermissions();
        $arr = json_decode($permissions, true);
        $permissionsArray = $arr['data'];
        foreach ($permissionsArray as $permission) {
            if (in_array($permission['permission'], $permissionName) && $permission['status'] == 'granted') {
                return true;
            }
        }

        return false;
    }

    public function getPagesId()
    {
        $pages = $this->getPages();
    }

    public function getLoginUrl()
    {
        $helper = $this->Facebook->getRedirectLoginHelper();

        return  $helper->getLoginUrl($this->redirectUrl(), $this->permissions);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Upwork\API\Client;
use Upwork\API\Config;

class UpworkController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getToken(Request $request)
    {

        //$request->session()->forget(['request_token', 'request_secret']);
        //$request->session()->flush();

        $config = new \Upwork\API\Config(
            array(
                'consumerKey'       => env('UPWORK_KEY'),  // SETUP YOUR CONSUMER KEY
                'consumerSecret'    => env('UPWORK_SECRET'),  // SETUP YOUR CONSUMER KEY
                'accessToken'       => session('access_token'),       // got access token
                'accessSecret'      => session('access_secret'),      // got access secret
                'requestToken'      => session('request_token'),      // got request token
                'requestSecret'     => session('request_secret'),     // got request secret
                'verifier'          => $request->oauth_verifier,         // got oauth verifier after authorization
                'mode'              => 'web',                           // can be 'nonweb' for console apps (default),
                // and 'web' for web-based apps
	            'debug' => true, // enables debug mode. Note that enabling debug in web-based applications can block redirects
                //	'authType' => 'MyOAuth' // your own authentication type, see AuthTypes directory
            )
        );


        $client = new Client($config);
        if (empty(session('request_token')) && empty(session('access_token'))) {
            // we need to get and save the request token. It will be used again
            // after the redirect from the Upwork site
            $requestTokenInfo = $client->getRequestToken();
            session(['request_token' => $requestTokenInfo['oauth_token']]);
            session(['request_secret' => $requestTokenInfo['oauth_token_secret']]);

            dump('A');
            dump(session('access_token'));
            dump('B');
            dump(session('access_secret'));
            dump('C');
            dump(session('request_token'));
            dump('D');
            dump(session('request_secret'));
            
            // request authorization
            $client->auth();
        } elseif (empty(session('access_token'))) {
            dump('1');
            dump(session('access_token'));
            dump('2');
            dump(session('access_secret'));
            dump('3');
            dump(session('request_token'));
            dump('4');
            dump(session('request_secret'));
            //return dd(session('access_token'));
            $accessTokenInfo = $client->auth();
            session(['access_token' => $accessTokenInfo['access_token']]);
            session(['access_secret' => $accessTokenInfo['access_secret']]);
        }


        // if authenticated
        if (session('access_token')) {
            // clean up session data
            $request->session()->forget(['request_token', 'request_secret']);
            $request->session()->flush();

            // gets info of the authenticated user
            $auth = new \Upwork\API\Routers\Auth($client);
            $info = $auth->getUserInfo();
            return dd($info);

            //$applications = new \Upwork\API\Routers\Hr\Freelancers\Applications($client);
            //return dd($applications->getList());
        }
    }
}

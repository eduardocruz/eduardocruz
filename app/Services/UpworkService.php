<?php


namespace App\Services;


use Illuminate\Http\Request;
use Upwork\API\Config;

class UpworkService
{

    public function config(Request $request)
    {
        $config = new Config(
            array(
                'consumerKey'       => env('UPWORK_KEY'),  // SETUP YOUR CONSUMER KEY
                'consumerSecret'    => env('UPWORK_SECRET'), // SETUP YOUR KEY SECRET
                'accessToken'       => session('access_token'),       // got access token
                'accessSecret'      => session('access_secret'),      // got access secret
                'requestToken'      => session('request_token'),      // got request token
                'requestSecret'     => session('request_secret'),     // got request secret
                'verifier'          => $request->get('oauth_verifier'),     // got request secret
                'mode'              => 'web',                           // can be 'nonweb' for console apps (default),
                //'debug' => true, // enables debug mode. Note that enabling debug in web-based applications can block redirects
                // and 'web' for web-based apps
                //	'authType' => 'MyOAuth' // your own authentication type, see AuthTypes directory
            )
        );

        $client = new \Upwork\API\Client($config);
        $token = $client->getRequestToken();

        return dd($token);
        $request_token = $token['oauth_token'];
        dump($request_token);
        $request_secret = $token['oauth_token_secret'];
        dump($request_secret);

        $auth = new \Upwork\API\Routers\Auth($client);
        $info = $auth->getUserInfo();
        return dd($info);

    }
}

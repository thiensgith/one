<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client;

class LoginController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $params = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => $request->email,
            'password' => $request->password,       
            'scope' => '*',
        ];


        $proxy = Request::create('oauth/token', 'POST', $params);

        $response = app()->handle($proxy);

        return $response;            
    }

    public function refresh_token(Request $request)
    {
        $this->validate($request, [
            'refresh_token' => 'required',
        ]);

        $params = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,     
            'scope' => '*',
        ];


        $proxy = Request::create('oauth/token', 'POST', $params);

        $response = app()->handle($proxy);

        return $response->getContent();              
    }

    public function logout(Request $request)
    {
        $tokens = Auth::user()->tokens;
        foreach ($tokens as $token) {
            $token->revoke();
        }
        return response()->json([], 204);
        
    }
	// private $client;

	// public function __construct()
	// {
	// 	$this->client = Client::find(2);
	// }

 //    public function register(Request $request)
 //    {
 //    	$this->validate($request, [
 //    		'first_name' => 'required',
 //    		'last_name' => 'required',
 //    		'email' => 'required|email|unique:users,email',
 //    		'password' => 'required|min:6|confirmed',
 //    	]);

 //    	$user = User::create([
 //    		'first_name' => $request->first_name,
 //    		'last_name' => $request->last_name,
 //    		'email' => $request->email,
 //    		'password' => Hash::make($request->password),
 //    	]);

 //        $params = [
 //            'grant_type' => 'password',
 //            'client_id' => $this->client->id,
 //            'client_secret' => $this->client->secret,
 //            'username' => $request->email,
 //            'password' => $request->password,       
 //            'scope' => '*',
 //        ];


 //        $proxy = Request::create('oauth/token', 'POST', $params);

 //        $response = app()->handle($proxy);

 //        return $response->getContent();
 //   }
}

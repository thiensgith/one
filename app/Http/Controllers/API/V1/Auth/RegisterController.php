<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client;

class RegisterController extends Controller
{
	private $client;

	public function __construct()
	{
		$this->client = Client::find(2);
	}

    public function register(Request $request)
    {
    	$this->validate($request, [
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required|min:6|confirmed',
    	]);

    	$user = User::create([
    		'first_name' => $request->first_name,
    		'last_name' => $request->last_name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
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
}

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'API\V1\Auth\RegisterController@register');
Route::post('login', 'API\V1\Auth\LoginController@login');
Route::post('refresh_token', 'API\V1\Auth\LoginController@refresh_token');



Route::middleware('auth:api')->group(function () {
	Route::get('user',function (Request $request) {
    	return $request->user();
});
    Route::post('logout', 'API\V1\Auth\LoginController@logout');
});

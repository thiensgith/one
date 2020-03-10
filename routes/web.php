<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'passport'], function() {
        Route::get('clients', function () {
		    return view('admin.passport.clients');
		});
		Route::get('authorized-clients', function () {
		    return view('admin.passport.authorized-clients');
		});
		Route::get('personal-access-tokens', function () {
		    return view('admin.passport.personal-access-tokens');
		});
    });
    Route::get('chat', function() {
        return view('admin.chat');
    });
});



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

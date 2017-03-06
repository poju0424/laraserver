<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('newest/{currency}', function($currency) {
	$tableName = "bot_".$currency;
	// $data = DB::table("bot_jpy")->get();
	$data = DB::table($tableName)->orderBy('datetime')->first();
	return $data;
});

Route::get('history/{currency}', function($currency) {
	$tableName = "bot_".$currency;
	$data = DB::table($tableName)->get();
	return $data;
});

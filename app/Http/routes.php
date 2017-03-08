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
	return (array)DB::table($tableName)->orderBy('datetime', 'desc')->first();
});

Route::get('history/{currency}', function($currency) {
	$tableName = "bot_".$currency;
	$data = DB::table($tableName)->get();
	return $data;
});

Route::resource('api', 'ApiController');

Route::resource('rate', 'RateController', ['parameters' => [
    'rate.history' => 'currency'
]]);

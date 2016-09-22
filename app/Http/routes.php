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

Route::auth();

#QR Code
/*
index
verify
image
*/
Route::get('/index', 'QR_CodeController@index');

Route::get('/verify', 'QR_CodeController@verify');
Route::post('/verifyProcess', 'QR_CodeController@verifyProcess');

Route::get('/image', 'QR_CodeController@image');
Route::post('/imageProcess', 'QR_CodeController@imageProcess');

#googleMap
/*
index
*/
Route::get('/indexgoogle', 'googleMapController@index');
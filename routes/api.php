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

Route::post('/register', 		 'MobileController@register');
Route::post('/redeem', 			 'MobileController@redeem');
Route::post('/claim', 			 'MobileController@claim');
Route::post('/user_info', 		 'MobileController@get_userinfo');
Route::post('/get_products', 	 'MobileController@get_products');
Route::post('/user_transaction', 'MobileController@get_usertransaction');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

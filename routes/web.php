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

Route::get('/', function () {
    return view("public_products");
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route("home");
});

Route::prefix('admin')->group(function () {
	Route::get('/', 		'HomeController@index')->name('home');
	Route::get('/products', 'HomeController@user_products')->name("user_products");
	Route::get('/account', 	'HomeController@account')->name("account");
	Route::post('/upload', 	'HomeController@upload')->name('upload');
});

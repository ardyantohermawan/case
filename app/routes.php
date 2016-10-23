<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('users', array('uses' => 'UserController@index'));
Route::post('users', array('uses' => 'UserController@store'));
Route::get('users/{$id}', array('uses' => 'UserController@edit'));
Route::put('users/{$id}', array('uses' => 'UserController@update'));
Route::delete('users/{$id}', array('uses' => 'UserController@remove'));

Route::get('products', array('uses' => 'ProductController@index'));
Route::post('products', array('uses' => 'ProductController@store'));
Route::get('products/{$id}', array('uses' => 'ProductController@edit'));
Route::put('products/{$id}', array('uses' => 'ProductController@update'));
Route::delete('products/{$id}', array('uses' => 'ProductController@remove'));

Route::get('checkout', array('uses' => 'CheckoutController@index'));
Route::post('checkout', array('uses' => 'CheckoutController@store'));
Route::get('checkout/{$id}', array('uses' => 'CheckoutController@edit'));
Route::put('checkout/{$id}', array('uses' => 'CheckoutController@update'));
Route::delete('checkout/{$id}', array('uses' => 'CheckoutController@remove'));

Route::get('shipping', array('uses' => 'ShippingController@index'));
Route::post('shipping', array('uses' => 'ShippingController@store'));
Route::get('shipping/{$id}', array('uses' => 'ShippingController@edit'));
Route::put('shipping/{$id}', array('uses' => 'ShippingController@update'));
Route::delete('shipping/{$id}', array('uses' => 'ShippingController@remove'));
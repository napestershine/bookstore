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

Route::get('/home', 'HomeController@index');

Route::get('/', ['middleware' => 'guest', 'uses' => 'BookController@getIndex']);


Route::get('/cart', array('before'=>'auth.basic','as'=>'cart','uses'=>'CartController@getIndex'));
Route::post('/cart/add', array('before'=>'auth.basic','uses'=>'CartController@postAddToCart'));
Route::get('/cart/delete/{id}', array('before'=>'auth.basic','as'=>'delete_book_from_cart','uses'=>'CartController@getDelete'));

Route::post('/order', array('before'=>'auth.basic','uses'=>'OrderController@postOrder'));
Route::get('/user/orders', array('before'=>'auth.basic','uses'=>'OrderController@getIndex'));
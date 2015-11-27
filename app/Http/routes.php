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
Route::get('/', 'BookController@index');
Route::get('/search', 'BookController@search');
Route::post('/search','BookController@postSearch');
Route::get('/search/result','BookController@searchResult');

Route::get('/book_info/{id}', 'BookController@book_info');
Route::get('/book_cate/{id}', 'BookController@book_cate');

Route::get('/cart','CartController@show');
Route::post('/cart','CartController@post');
Route::post('/cart_update','CartController@update');
Route::post('/cart_delete','CartController@delete');
Route::post('/cart_remove','CartController@remove');

Route::get('/order','OrderController@store');
Route::get('/order/history','OrderController@history');
Route::get('/order/{id}','OrderController@show');
Route::post('/order/','OrderController@order_one');
Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController',
]);
//
Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@checkLogin');
//
Route::get('/admin_users', 'AdminController@admin_users');
Route::post('/admin_users', 'AdminController@search_user');
Route::post('/delete_user/', 'AdminController@delete_user');
//
Route::get('/admin_books', 'AdminController@admin_books');
Route::post('/admin_books', 'AdminController@search_book');
Route::post('/delete_book/', 'AdminController@delete_book');

Route::get('/test','TestController@index');
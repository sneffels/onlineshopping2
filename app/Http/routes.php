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
    return redirect('/products');
});
Route::get('/products','ProductController@index');
Route::get('/products/{id}','ProductController@show');
Route::get('/cart/','CartController@create');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/permiso',"ProfileController@dar_permiso");
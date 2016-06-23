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
Route::get('/product/edit/{id}','ProductController@edit');
Route::put('product/update/{id}','ProductController@update');
Route::get('/product/create ','ProductController@create');
Route::post('product','ProductController@store');
Route::post('/user/cart','ProductDetailController@store');
Route::get('/user/cart','ProductDetailController@index');
Route::get('/user/cart/product/{id}/modify','ProductDetailController@edit');
Route::put('productdetail/update/{id}','ProductDetailController@update');
Route::delete('productdetail/{id}','ProductDetailController@destroy');
Route::get('/user/cart/purchase/','PurchaseController@index');
Route::post('/user/cart/purchase/','PurchaseController@store');

Route::auth();

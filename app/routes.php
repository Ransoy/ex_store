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

Route::get('/','PageController@index');

Route::post('/login','PageController@login');
Route::get('/logout','PageController@logout');

Route::get('/main','BakerController@index');
Route::get('/main/{id?}','BakerController@detail');
Route::post('/add','BakerController@add');
Route::post('/edit','BakerController@edit');
Route::post('/delete','BakerController@delete');
Route::post('/search','BakerController@search');

Route::post('/main/{id?}/add_item','BakerController@add_item');
Route::post('/main/{id?}/edit_item','BakerController@edit_item');
Route::post('/main/{id?}/delete_item','BakerController@delete_item');
//Route::get('/main/{id?search?}','BakerController@search_item');
Route::get('/main/save','BakerController@save');

Route::get('/store','StoreController@index');
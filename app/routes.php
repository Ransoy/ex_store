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

Route::get('/main/save','BakerController@save');
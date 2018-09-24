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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Rutas del controlador de Videos
Route::get('/crear-video', array(
     'as'=>'createVideo',
     'middleware'=>'auth',
     'uses'=>'VideoController@createVideo'
));

Route::post('/guardar-video', array(
    'as'=>'saveVideo',
    'middleware'=>'auth',
    'uses'=>'VideoController@saveVideo'
));

Route::get('/miniatura/{filename}', array(
     'as'=>'imageVideo',
     'middleware'=>'auth',
     'uses'=>'VideoController@getImage'

));

Route::get('/video/{video_id}', array(
    'as'=>'detailvideo',
    'uses'=>'VideoController@getVideoPage'

));

Route::get('/video-file/{filename}', array(
    'as'=>'fileVideo',
    'uses'=>'VideoController@getVideo'
));
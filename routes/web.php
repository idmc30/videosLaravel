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



Route::get('/','HomeController@index')->name('home');

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

Route::get('/editar-video/{idvideo}', array(
    'as'=>'videoedit',
    'middleware'=>'auth',
    'uses'=>'VideoController@edit'
));


Route::get('/delete-video/{idvideo}', array(
    'as'=>'videodelete',
    'middleware'=>'auth',
    'uses'=>'VideoController@delete'
));


Route::post('/actualizar-video/{id}', array(
    'as'=>'updateVideo',
    'middleware'=>'auth',
    'uses'=>'VideoController@update'
));


Route::get('/videoSearch/{search?}/{filter?}', array(
    'as'=>'videoSearch',
    'uses'=>'VideoController@search'
));

//comentarios
Route::post('/comment', array(
    'as'=>'comment',
    'middleware'=>'auth',
    'uses'=>'CommentController@store'
));

Route::get('/delete-comment/{idcomment}', array(
    'as'=>'commentdelete',
    'uses'=>'CommentController@delete'
));
//usuarios
Route::get('/canal/{user_id}', array(
    'as'=>'channel',
    'uses'=>'UserController@channel'
));

//borrando cache laravel
Route::get("/clear-cache",function (){
    $code = Artisan::call('cache:clear');
});

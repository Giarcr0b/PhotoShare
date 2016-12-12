<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});
Route::get('pages/search', 'PagesController@search');
Route::post('pages/search', 'PagesController@result');
Route::get('pages/photographer', 'PagesController@photographer');
Route::get('pages/profile/{id}', 'PagesController@profile');
Route::get('pages/album/{id}', 'PagesController@showAlbum');
Route::get('pages/photo/{id}', 'PagesController@showPhoto');


Route::get('admin/index', ['uses' => 'UsersController@index']);
Route::get('admin/create', ['uses' => 'UsersController@create']);
Route::get('admin/edit/{id}',  'UsersController@edit');
Route::post('admin/update/{id}', 'UsersController@update');
Route::post('admin/store', ['uses' => 'UsersController@store']);
Route::post('admin/delete/{id}', 'UsersController@destroy');
Route::get('admin/authorise/{id}', 'UsersController@authorise');
Route::get('admin/chat/{id}', 'UsersController@ban');

Route::get('profiles/index', 'ProfilesController@index');
Route::get('profiles/editProfile', 'ProfilesController@editProfile');
Route::post('profiles/update/{id}', 'ProfilesController@updateProfile');
Route::get('profiles/album/{id}', 'ProfilesController@showAlbum');
Route::post('profiles/buy/{id}', 'ProfilesController@buyPhoto');

// Routes for Albums
Route::get('albums/show', 'AlbumsController@show');
Route::get('albums/editAlbum/{id}', 'AlbumsController@edit');
Route::post('albums/update/{id}', 'AlbumsController@update');
Route::post('albums/delete/{id}', 'AlbumsController@destroy');
Route::get('albums/create', 'AlbumsController@create');
Route::post('albums/store', 'AlbumsController@store');

// Routes for Photos
Route::get('photos/edit/{id}', 'PhotosController@edit');
Route::post('photos/update/{id}', 'PhotosController@update');
Route::post('photos/delete/{id}', 'PhotosController@destroy');
Route::get('photos/create/{id}', 'PhotosController@create');
Route::post('photos/store/{id}', 'PhotosController@store');

//Routes for chat
Route::get('profiles/chat', 'ProfilesController@chat');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'Auth'], function(){

});

Route::group(['middleware' => ['Auth', 'photographer']], function(){

});
Route::group(['middleware' => ['Auth', 'shopper']], function(){

});
Route::group(['middleware' => ['Auth', 'admin']], function(){

});
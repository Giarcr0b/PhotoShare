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
Route::get('pages/photographer', 'PagesController@photographer');
Route::get('pages/profile/{id}', 'PagesController@profile');

Route::get('blade', 'PagesController@blade');

Route::get('admin/index', ['uses' => 'UsersController@index']);
Route::get('admin/create', ['uses' => 'UsersController@create']);
Route::post('admin/store', ['uses' => 'UsersController@store']);

Route::get('profiles/index', 'ProfilesController@index');
//Route::get('photographer', 'ProfilesController@photographer');
Route::get('shopper', 'ProfilesController@shopper');

// Routes for Albums
Route::get('albums/create', 'AlbumsController@create');
Route::get('albums', array('as' => 'index','uses' => 'AlbumsController@getList'));
Route::get('albums/createalbum', array('as' => 'create_album_form','uses' => 'AlbumsController@getForm'));
Route::post('albums/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate'));
Route::get('albums/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'));
Route::get('albums/album/{id}', array('as' => 'show_album','uses' => 'AlbumsController@getAlbum'));
/*
Route::get('users', function ()
{
    $users = [
        '0' => ['first_name' => 'Craig',
            'last_name' => 'Robertson',
            'location' => 'Lumsden'],
        '1' => ['first_name' => 'Laura',
            'last_name' => 'Bunyan',
            'location' => 'Blackford']
    ];
    return $users;
});
*/
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
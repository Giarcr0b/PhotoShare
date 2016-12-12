<?php

namespace App\Http\Controllers;


use App\Album;
use View;
use Validator, Input, Redirect;
use Request;
class AlbumsController extends Controller
{
    public function create()
    {
        return view('albums.createAlbum');
    }
    public function getList()
    {
        $albums = Album::with('Photos')->get();
        return View::make('albums.index')
            ->with('albums',$albums);
    }
    public function getAlbum($album_id)
    {
        $album = Album::with('Photos')->find($album_id);
        return View::make('albums.album')
            ->with('album',$album);
    }
    public function getForm()
    {
        return View::make('albums.createalbum');
    }
    public function postCreate()
    {
        $rules = array(

            'name' => 'required',
            'cover_image'=>'required|image'

        );

        $validator = Validator::make(Request::all(), $rules);
        if($validator->fails()){

            return Redirect::route('create_album_form')
                ->withErrors($validator)
                ->withInput();
        }

        $file = Request::file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_cover.'.$extension;
        $uploadSuccess = Request::file('cover_image')
            ->move($destinationPath, $filename);
        $album = Album::create(array(
            'id' => Request::get('id'),
            'name' => Request::get('name'),
            'description' => Request::get('description'),
            'cover_image' => $filename,
        ));

        return Redirect::route('show_album',array('album_id'=>$album->album_id));
    }

    public function getDelete($album_id)
    {
        $album = Album::find($album_id);

        $album->delete();

        return Redirect::route('albums.index');
    }
}

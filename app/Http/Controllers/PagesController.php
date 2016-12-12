<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use View;
use App\User;
use App\Album;
use App\Photo;
use Image;

class PagesController extends Controller
{
    public function index()
    {

    }

    public function profile($id)
    {

        $user = User::where('id', $id)->first();
        $albums = Album::where('user_id', $id)->get();
        return view('pages.profile', compact('user', 'albums'));
    }

    public function blade()
    {

    }

    public function photographer()
    {

        $photographers = User::where('user_type', 'photographer')->paginate(6);
        return view('pages.photographer', compact('photographers'));
    }

    public function search()
    {
        $photos = null;
        return view('pages.search', compact('photos'));
    }

    public function showAlbum($id)
    {
        $photos = Photo::where('album_id', $id)->paginate(6);

        return view('pages.album', compact('photos'));
    }

    public function result(Request $request)
    {
        if ($request->search_type == 'title') {
            //return photos with search in title
            $term =
            $photos = Photo::where('title', 'like', "%{$request->search_term}%")->get();
        } elseif ($request->search_type == 'description') {
            //return photos with search in description
            $photos = Photo::where('description', 'like', "%{$request->search_term}%")->get();
        } elseif ($request->search_type == 'low_price') {
            //return photos below price
            $photos = Photo::where('price', '<=', $request->search_term)->get();
        } else {
            //return photos above price
            $photos = Photo::where('price', '>=', $request->search_term)->get();
        }

        return view('pages.search', compact('photos'));
    }

    public function showPhoto($id)
    {


        $photo = Photo::where('id', $id)->first();
        $album = Album::where('id', $photo->album_id)->first();
        $exif = Image::make("d:/wamp64/www/photoShare/public/photos/{$photo->photo}")->exif();

        return view('pages.photo', compact('photo', 'exif', 'album'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use View;
use Validator, Redirect;
use App\User;
use App\Photo;
use App\Album;
use Auth;

class ProfilesController extends Controller
{
    public function index()
    {
        return view('profiles.index');
    }

    public function editProfile()
    {
        return view('profiles.editProfile');
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required'
        ]);


        $oldUser = User::where('id', $id)->first();
        if (isset($request->profile_pic)) {
            $file = $request->profile_pic;
            $random_name = str_random(8);
            $destinationPath = 'profile/';
            $extension = $file->getClientOriginalExtension();
            $filename = $random_name . '_profile.' . $extension;
            $uploadSuccess = $request->profile_pic
                ->move($destinationPath, $filename);
        } else {
            $filename = $oldUser->profile_pic;
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->profile_pic = $filename;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();

        return view('profiles.index');
    }

    public function shopper()
    {
        return view('profiles.shopper');
    }

    public function showAlbum($id)
    {
        $photos = Photo::where('album_id', $id)->paginate(6);

        return view('profiles.album', compact('photos', 'id'));
    }

    public function buyPhoto($id)
    {
        $photo = Photo::where('id', $id)->first();
        $userAlbum = Album::where('user_id', Auth::user()->id)->first();

        if ($userAlbum == null)
        {
            $newAlbum = new album;
            $newAlbum->name = 'Purchases';
            $newAlbum->user_id = Auth::user()->id;
            $newAlbum->description = 'Photos you have bought.';
            $newAlbum->cover_image = 'default.jpg';
            $newAlbum->save();

            $newPhoto = new photo;
            $newPhoto->title = $photo->title;
            $newPhoto->photo = $photo->photo;
            $newPhoto->description = $photo->description;
            $newPhoto->price = $photo->price;
            $newPhoto->album_id = $newAlbum->id;
            $newPhoto->save();
        }
        else
        {
            $newPhoto = new photo;
            $newPhoto->title = $photo->title;
            $newPhoto->photo = $photo->photo;
            $newPhoto->description = $photo->description;
            $newPhoto->price = $photo->price;
            $newPhoto->album_id = Auth::user()->id;
            $newPhoto->save();
        }
        $album = Album::where('id', $photo->album_id)->first();
        return view('pages.photo', compact('photo', 'album'));
    }

    Public function chat()
    {
        return view('profiles.chat');
    }
}

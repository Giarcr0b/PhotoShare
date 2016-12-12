<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Validator, Redirect;
use App\User;
use App\Photo;
use App\Album;
use Auth;
class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create a new album
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store ALbum
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'required',

        ]);
        $file = $request->cover_image;
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename = $random_name . '_album.' . $extension;
        $uploadSuccess = $request->cover_image
            ->move($destinationPath, $filename);

        $album = new album;
        $album->name = $request->name;
        $album->cover_image = $filename;
        $album->description = $request->description;
        $album->user_id = Auth::user()->id;
        $album->save();

        return view('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::where('id', $id)->first();
        return view('albums.editAlbum', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',

        ]);
        $oldAlbum = Album::where('id', $id)->first();
        if (isset($request->cover_image)) {
            $file = $request->cover_image;
            $random_name = str_random(8);
            $destinationPath = 'albums/';
            $extension = $file->getClientOriginalExtension();
            $filename = $random_name . '_album.' . $extension;
            $uploadSuccess = $request->cover_image
                ->move($destinationPath, $filename);
        } else {
            $filename = $oldAlbum->cover_image;

        }


        $album = Album::findOrFail($id);
        $album->name = $request->name;
        $album->cover_image = $filename;
        $album->description = $request->description;
        $album->save();

        return view('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete album
        $album = Album::findOrFail($id);
        $album->delete();

        return view('profiles.index');
    }
}

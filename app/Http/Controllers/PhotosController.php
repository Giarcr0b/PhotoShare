<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use View;
class PhotosController extends Controller
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
    public function create($id)
    {
        //

        return view('photos.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'price' => 'required',

        ]);

        $file = $request->photo;
        $random_name = str_random(8);
        $destinationPath = 'photos/';
        $extension = $file->getClientOriginalExtension();
        $filename = $random_name . '_photo.' . $extension;
        $uploadSuccess = $request->photo
            ->move($destinationPath, $filename);

        $photo = new photo;
        $photo->title = $request->title;
        $photo->photo = $filename;
        $photo->description = $request->description;
        $photo->price = $request->price;
        $photo->album_id = $id;
        $photo->save();

        $photos = Photo::where('album_id', $id)->get();

        return view('profiles.index', compact('photos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::where('id', $id)->first();
        return view('photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update photo


        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);
        $oldPhoto = Photo::where('id', $id)->first();

        if (isset($request->photo)) {
            $file = $request->photo;
            $random_name = str_random(8);
            $destinationPath = 'photos/';
            $extension = $file->getClientOriginalExtension();
            $filename = $random_name . '_photo.' . $extension;
            $uploadSuccess = $request->photo
                ->move($destinationPath, $filename);
        } else {
            $filename = $oldPhoto->photo;

        }


        $photo = Photo::findOrFail($id);
        $photo->title = $request->title;
        $photo->photo = $filename;
        $photo->description = $request->description;
        $photo->price = $request->price;
        $photo->save();
        $id = $oldPhoto->album_id;
        $photos = Photo::where('album_id', $oldPhoto->album_id)->paginate(6);

        return view('profiles.album', compact('photos', 'id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete photo
        $oldPhoto = Photo::where('id', $id)->first();
        $photo =Photo::findOrFail($id);
        $photo->delete();
        
        $photos = Photo::where('album_id', $oldPhoto->album_id)->paginate(6);

        return view('profiles.album', compact('photos'));
    }
}

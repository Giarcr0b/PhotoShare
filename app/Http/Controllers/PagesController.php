<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class PagesController extends Controller
{
    public function index()
    {
        if(View::exists('pages.index'))
            return view('pages.index')
                ->with('text', '<b>Laravel</b>')
                ->with('name', 'Nicole')
                ->with(['location' => 'Scotland', 'planet' => 'Earth']);
       // return view('pages.index', ['text' => '<b>Laravel</b>']);
        else
            return 'No view Available';
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function blade()
    {
        $gender = 'feugjgmale';
        $text = 'Hello World!';
        return view('blade.bladetest', compact('gender', 'text'));
    }
}

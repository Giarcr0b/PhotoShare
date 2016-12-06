<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\User;

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

    public function profile($id)
    {

$user = User::where('id', $id)->get();
        return view('pages.profile', compact('user'));
    }

    public function blade()
    {
        $gender = 'feugjgmale';
        return view('blade.bladetest', compact('gender'));
    }

    public function photographer()
    {

        $photographers = User::where('user_type', 'photographer')->paginate(6);
        return view('pages.photographer', compact('photographers'));
    }

    public function search ()
    {
        return view('pages.search');
    }
}

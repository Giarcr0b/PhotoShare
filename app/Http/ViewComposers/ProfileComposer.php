<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;
use App\Album;
class ProfileComposer
{
    public function compose(View $view)
    {
        $view->with('auth', Auth::user())->with('albums', Album::where('user_id', Auth::user()->id)->get());
    }
}
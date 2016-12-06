<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;

class ProfileComposer
{
    public function compose(View $view)
    {
        $view->with('auth', Auth::user());
    }
}
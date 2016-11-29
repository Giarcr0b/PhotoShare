<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = [
            '0' => ['first_name' => 'Craig',
                'last_name' => 'Robertson',
                'location' => 'Lumsden'],
            '1' => ['first_name' => 'Laura',
                'last_name' => 'Bunyan',
                'location' => 'Blackford']
        ];
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return 'success';
        return $request->all();
    }
}

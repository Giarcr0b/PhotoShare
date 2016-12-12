<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->first();

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->username != $user->username) {
            if ($request->email != $user->email) {
                $this->validate($request, [
                    'name' => 'required',
                    'username' => 'required|max:25|unique:users',
                    'email' => 'required|email|max:255|unique:users',
                ]);
            } else {
                $this->validate($request, [
                    'name' => 'required',
                    'username' => 'required|max:25|unique:users',

                ]);
            }
        } else {
            if ($request->email != $user->email) {
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required|email|max:255|unique:users',
                ]);
            } else {
                $this->validate($request, [
                    'name' => 'required',
                    'username' => 'required',
                    'email' => 'required',
                ]);
            }
        }
        /*$this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);*/


        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return 'success';
        return $request->all();
    }

    public function destroy($id)
    {
//Admin delete user
        $user = User::findOrFail($id);
        $user->delete();

        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));


    }

    Public function authorise($id)
    {
        // autourise user
        $user = User::findOrFail($id);
        $user->authorised = 'yes';
        $user->save();

        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function ban($id)
    {
        // ban Photographer from chat
        $user = User::findOrFail($id);
        if ($user->chat_access == 'yes') {
            $user->chat_access = 'no';
        } else {
            $user->chat_access = 'yes';
        }

        $user->save();

        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }
}

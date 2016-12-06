@extends('layouts.logedon_master')

@section('content')
    <div class="header">
        <h2>Users</h2>

    </div>
    <div class="row marketing">
        <div col-md-6 col-md-offset-3>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item" style="margin-top: 20px">

                    <span>
                        {{ $user->name }}
                        {{ $user->profile_pic }}
                    </span>
                        <span class="pull-right clearfix">
                        Joined ({{ $user->created_at->diffForHumans() }})
                            <button class="btn btn-xs btn-primary">Edit</button>
                            <button class="btn btn-xs btn-primary">Delete</button>
                            <button class="btn btn-xs btn-primary">Ban</button>
                    </span>

                    </li>

                @endforeach
                {{ $users->links() }}
            </ul>
        </div>
    </div>
@endsection

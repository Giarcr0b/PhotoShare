@extends('layouts.logedon_master')

@section('content')
    <div class="header">
        <h2>Users</h2>

    </div>
    <div class="row marketing">
        <div>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item" style="margin-top: 20px">

                    <span>
                        <h4>Name: {{ $user->name }}</h4>
                        <h4>Email: {{ $user->email }}</h4>
                        <h4>User Name: {{ $user->username }}</h4>
                        <h4>User Type: {{ $user->user_type }}</h4>
                        <h4>Chat: {{ $user->chat_access }}</h4>

                        {{--</span>
                            <span class="pull-right clearfix">--}}
                        <p>Joined ({{ $user->created_at->diffForHumans() }})</p>


                        {{--<button class="btn btn-xs btn-primary">Edit</button>
                        <button class="btn btn-xs btn-primary">Delete</button>
                        <button class="btn btn-xs btn-primary">Ban</button>--}}
                    </span>

                        <form method="post" action="{{ url('/admin/delete', array('id'=>$user->id)) }}">
                            <input name="method" type="hidden" value="delete">
                            {{ csrf_field() }}
                            <a href="{{ url('/admin/edit', array('id'=>$user->id)) }}" class="btn btn-primary">Edit</a>
                            @if($user->user_type == 'Photographer')

                                @if($user->authorised == 'no')
                                    <a href="{{ url('/admin/authorise', array('id'=>$user->id)) }}"
                                       class="btn btn-success">Aprove</a>

                                    @if($user->chat_access == 'no')
                                        <a href="{{ url('/admin/chat', array('id'=>$user->id)) }}"
                                           class="btn btn-warning">Allow Chat</a>
                                    @else
                                        <a href="{{ url('/admin/chat', array('id'=>$user->id)) }}"
                                           class="btn btn-warning">Ban Chat</a>

                                    @endif
                                @else
                                    @if($user->chat_access == 'no')
                                        <a href="{{ url('/admin/chat', array('id'=>$user->id)) }}"
                                           class="btn btn-warning">Allow Chat</a>
                                    @else
                                        <a href="{{ url('/admin/chat', array('id'=>$user->id)) }}"
                                           class="btn btn-warning">Ban Chat</a>
                                    @endif
                                @endif
                            @endif

                            <input type="submit" class="btn btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this user?');" name="name"
                                   value="Delete">
                        </form>
                    </li>

                @endforeach
                {{ $users->links() }}
            </ul>
        </div>
    </div>
@endsection

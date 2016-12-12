@extends('layouts.logedon_master')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>{{ $auth->user_type }}: {{ $auth->name }}</h2></div>

                    <div class="panel-body text-center">
                        <img class="img-circle img-thumbnail"
                             src="/profile/{{ $auth->profile_pic }}"
                             alt="Profile pic"
                             height="250"
                             width="250">
                        <h3 class="text-left">Name: {{ $auth->name }}</h3>
                        <h3 class="text-left">User name: {{ $auth->username }}</h3>
                        <h3 class="text-left">Email: {{ $auth->email }}</h3>
                        <div class="panel panel-default text-left">
                            <h3>Bio: </h3>
                            <p>{{ $auth->bio }}</p>
                        </div>
                        <ul class="text-left">
                            <a class="btn btn-primary" href="{{ url('/profiles/editProfile') }}">
                                Edit Profile</a>
                            <a class="btn btn-success" href="{{ url('/albums/create') }}">
                                Add Album</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($auth->user_type == 'Photographer')

        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Albums</h2></div>

                <div class="panel-body text-center">
                    <div class="row marketing">
                        @foreach($albums as $album)
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-body text-center">

                                        <a href="{{ url('/profiles/album', array('id'=>$album->id)) }}">
                                            <img class="img-thumbnail img-circle"
                                                 src="/albums/{{ $album->cover_image }}"
                                                 alt="Profile pic">
                                        </a>
                                        <h4>Album: {{ $album->name }}</h4>
                                    </div>
                                    <ul class="text-left">

                                        <form method="post"
                                              action="{{ url('/albums/delete', array('id'=>$album->id)) }}">
                                            <input name="method" type="hidden" value="delete">
                                            {{ csrf_field() }}
                                            <a href="{{ url('/albums/editAlbum', array('id'=>$album->id)) }}"
                                               class="btn btn-primary">Edit</a>
                                            <input type="submit" class="btn btn-danger"
                                                   onclick="return confirm('Are you sure you want to delete this album all photos will be lost!!');"
                                                   name="name" value="Delete">
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Albums</h2></div>

                <div class="panel-body text-center">
                    <div class="row marketing">
                        @foreach($albums as $album)
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-body text-center">

                                        <a href="{{ url('/profiles/album', array('id'=>$album->id)) }}">
                                            <img class="img-thumbnail img-circle"
                                                 src="/albums/{{ $album->cover_image }}"
                                                 alt="Profile pic">
                                        </a>
                                        <h4>{{ $album->name }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
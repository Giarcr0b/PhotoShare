@extends( Auth::check() ?  'layouts.logedon_master' : 'layouts.welcome_master' )

@section('title')
    Photographer Profile
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Photographer: {{ $user->name }}</h2></div>

                    <div class="panel-body text-center">
                        <img class="img-circle img-thumbnail"
                             src="/profile/{{ $user->profile_pic }}"
                             alt="Profile pic"
                             height="250"
                             width="250">
                        <h3 class="text-left">Name: {{ $user->name }}</h3>
                        <h3 class="text-left">Email: {{ $user->email }}</h3>
                        <div class="panel panel-default text-left">
                            <h3>Bio: </h3>
                            <p>{{ $user->bio }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>Albums</h2></div>

            <div class="panel-body text-center">
                <div class="row marketing">
                    @foreach($albums as $album)
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-body text-center">

                                    <a href="{{ url('/pages/album', array('id'=>$album->id)) }}">
                                        <img class="img-thumbnail img-circle"
                                             src="/albums/{{ $album->cover_image }}"
                                             alt="Profile pic">
                                    </a>
                                    <h4>Album: {{ $album->name }}</h4>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

    </div>

@endsection

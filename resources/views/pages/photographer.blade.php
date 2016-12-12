@extends( Auth::check() ?  'layouts.logedon_master' : 'layouts.welcome_master' )


@section('title')
    Photographers
@endsection

@section('content')
    <div class="header">
        <h1 align="center">Photographers</h1>

    </div>
    <div class="row marketing">
        @foreach($photographers as $user)
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body text-center">

                        <a href="{{ url('/pages/profile', array('id'=>$user->id)) }}">
                            <img class="img-thumbnail img-circle"
                                 src="/profile/{{ $user->profile_pic }}"
                                 alt="Profile pic">
                        </a>
                        <h4>{{ $user->name }}</h4>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
    {{ $photographers->links() }}
@endsection
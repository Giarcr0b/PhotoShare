@extends( Auth::check() ?  'layouts.logedon_master' : 'layouts.welcome_master' )

@section('title')
    Photographer Profile
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Photographer: User Name</h2></div>

                    <div class="panel-body text-center">
                         <img class="img-circle img-thumbnail"
                             src="/profile/default.jpg"
                             alt="Profile pic">
                        <h3>Name: Name</h3>
                        <h3>Email: email</h3>
                        <p>Bio: </p>
                        <p>bio</p>

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
                    @for($i = 0; $i < 6; $i++)
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-body text-center">

                                    <a href="#">
                                        <img class="img-thumbnail img-circle"
                                             src="/profile/default.jpg"
                                             alt="Profile pic">
                                    </a>
                                    <h4>Album{{ $i }}</h4>
                                </div>
                            </div>
                        </div>

                    @endfor
                </div>
            </div>
        </div>

    </div>

@endsection

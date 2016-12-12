@extends('layouts.welcome_master')

@section('title')
    Welcome
@endsection

@section('content')
    <div class="jumbotron">
        <h2>
            Welcome to Photo Share
        </h2>
        <p class="lead">A photography sharing site for photographers and buyers of photographs. Feel free to browse our
            site or click the link below to register an account with us.</p>
        <p><a class="btn btn-lg btn-success" href="{{ url('/register') }}" role="button">Join us Today</a></p>
    </div>

    <div class="row marketing">
        @for($i = 0; $i < 6; $i++)
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body text-center">

                        <a href="#">
                            <img class="img-thumbnail"
                                 src="/profile/default.jpg"
                                 alt="Profile pic">
                        </a>
                        <h4>Photo: {{ $i }}</h4>
                    </div>
                </div>
            </div>

        @endfor
    </div>
@endsection
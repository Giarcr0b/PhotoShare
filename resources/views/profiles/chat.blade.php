@extends('layouts.logedon_master')

@section('title')
    Chat Room
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Chat Room</div>

                <div class="panel-body" align="center">
                    <h1>Welcome to the chat room</h1>
                    <h3>{{ $auth->name }}</h3>
                    <h3>Unfortunately we are experiencing some technical dificulties just now. Check back later.</h3>
                    <h3>Sorry for the inconvienence.</h3>
                    <h2>Share and Enjoy!!</h2>


                </div>
            </div>
        </div>
    </div>
@endsection

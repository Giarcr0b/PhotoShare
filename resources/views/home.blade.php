@extends('layouts.logedon_master')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Members Area</div>

                <div class="panel-body" align="center">
                    <h1>Welcome</h1>
                    <h3>{{ $auth->name }}</h3>


                </div>
            </div>
        </div>
    </div>
@endsection

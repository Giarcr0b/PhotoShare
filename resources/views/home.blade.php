@extends('layouts.logedon_master')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1></h1>
                    <h3></h3>
                    {{ $auth->email }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

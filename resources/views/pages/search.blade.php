@extends( Auth::check() ?  'layouts.logedon_master' : 'layouts.welcome_master' )


@section('title')
    Search
@endsection

@section('content')
    <div class="header">
        <h1 align="center">Search</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Photos</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/pages/search') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="search_type" class="col-md-4 control-label">Search on:</label>

                                <div class="col-md-6">
                                    <select id="search_type" type="text" class="form-control" name="search_type"
                                            list="search_type">

                                        <option value="title">Photo Title</option>
                                        <option value="description">Photo Description</option>
                                        <option value="low_price">Price below</option>
                                        <option value="high_price">Price above</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="search_term" class="col-md-4 control-label">Search For:</label>

                                <div class="col-md-6">
                                    <input id="search_term" type="text" class="form-control"
                                           name="search_term">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">

                                    <button type="submit" class="btn btn-primary">
                                        Find Photos
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($photos))
        <div class="header">
            <h1 align="center">Results</h1>

        </div>
        <div class="row marketing">
            @foreach($photos as $photo)
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <a href="{{ url('/pages/photo', array('id'=>$photo->id)) }}">
                                <img class="img-thumbnail"
                                     src="/photos/{{ $photo->photo }}"
                                     alt="Profile pic">
                            </a>
                            <h4>Title: {{ $photo->title }}</h4>
                            <p>{{ $photo->description }}</p>
                            <h4>Price: £{{ $photo->price }}</h4>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    

    @endif
@endsection
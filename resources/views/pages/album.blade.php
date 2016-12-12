@extends( Auth::check() ?  'layouts.logedon_master' : 'layouts.welcome_master' )


@section('title')
    Photos
@endsection

@section('content')
    <div class="header">
        <h1 align="center">Album Contents</h1>

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
    {{ $photos->links() }}
@endsection
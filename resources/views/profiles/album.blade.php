@extends( Auth::check() ?  'layouts.logedon_master' : 'layouts.welcome_master' )


@section('title')
    Photos
@endsection

@section('content')
    <div class="header">
        <h1 align="center">Album Contents</h1>
        <p align="right"><a class="btn btn-success" href="{{ url('/photos/create', array('id'=>$id)) }}">Add Photo</a></p>

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
                    <ul class="text-left">
                        <form method="post" action="{{ url('/photos/delete', array('id'=>$photo->id)) }}">
                            <input name="method" type="hidden" value="delete">
                            {{ csrf_field() }}
                            <a href="{{ url('/photos/edit', array('id'=>$photo->id)) }}" class="btn btn-primary">Edit</a>
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this photo?');" name="name" value="Delete">
                        </form>
                    </ul>
                </div>
            </div>

        @endforeach
    </div>
    {{ $photos->links() }}
@endsection
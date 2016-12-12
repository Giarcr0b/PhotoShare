@extends( Auth::check() ?  'layouts.logedon_master' : 'layouts.welcome_master' )


@section('title')
    Photo
@endsection

@section('content')
    <div class="header">
        <h1 align="left">Photo: {{ $photo->title }}</h1>

    </div>
    <div class="row marketing">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">


                    <img class="img"
                         src="/photos/{{ $photo->photo }}"
                         alt="Profile pic">


                    <h4>Description</h4>
                    <p>{{ $photo->description }}</p>
                    <h4>Price: £{{ $photo->price }}</h4>
                    @if( Auth::check())
                        @if ( Auth::user()->user_type == 'Shopper' && $album->user_id != Auth::user()->id)

                            <form method="post" action="{{ url('/profiles/buy', array('id'=>$photo->id)) }}">
                                <input name="method" type="hidden" value="delete">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" name="name" value="Buy Photo">
                            </form>

                        @endif



                    @endif

                </div>
            </div>
        </div>

        {{--@foreach($exif as $data)

            <p>{{ $data }}</p>
            @endforeach--}}
    </div>

@endsection
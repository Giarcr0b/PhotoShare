@foreach($users as $user)
    <li>{!! $user['first_name'] !!}</li>
    <li>{!! $user['last_name'] !!}</li>
    <li>{!! $user['location'] !!}</li>
    <br/>
@endforeach
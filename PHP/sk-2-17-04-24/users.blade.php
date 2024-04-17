<h1>Welcome {{$nick}}</h1>

<h3>Users</h3>

@foreach($users as $user)
<h3>{{$user->name}}</h3>
@endforeach
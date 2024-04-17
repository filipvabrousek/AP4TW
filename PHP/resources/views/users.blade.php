<h1>Users</h1>

@foreach ($users as $user)
    <h3>{{$user->name}}</h3>
@endforeach;
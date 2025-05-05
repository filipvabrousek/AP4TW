<?php


Route::get('/', function (){
  return view('playground', [
    'title' => 'Laravel Playground'
  ]);
});


Route::get('/users', function (){
$users = array("Volvo", "BMW", "Toyota");
  return view('users', [
    'users' => $users
  ]);
});


use Illuminate\Http\Request;
Route::get("/submit-form", function(Request $request ){
  $name = $request->query("name");
  $password = $request->query("password");

  $uname = strtoupper($name);

  return response()->json([
    "name" => $name, 
    "password" => $password,
    "uname" => $uname
  ]);
  

});


playground balde php


            <h1>Welcome to {{ $title }}</h1>

<form action="/submit-form">
@csrf

<input 
type="text"
 placeholder="name" 
name="name"/>

<input 
type="password"
 placeholder="password"
 name="password"/>

<button type="submit">Send</button>
</form>



users

<h1>Users</h1>

<ul>
@foreach($users as $user)
    <li>{{ $user }}</li>
@endforeach
</ul>

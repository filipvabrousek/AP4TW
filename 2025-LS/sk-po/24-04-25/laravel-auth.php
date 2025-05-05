
<?php


Route::get('/users', function (){
  $users = array("Karel", "Eda", "Hana");

  return view('users', [
    'title' => 'Hello',
 'users' => $users
  ]);
});


Route::get('/admin', function (){
  return view('admin', [
    'name' => 'Eda'
  ]);
});

Route::get('/', function (){
  return view('playground', [
    "title" => "Hello",
    'name' => 'Eda'
  ]);
});



use Illuminate\Http\Request;
Route::get("/submit-form", function(Request $request) {

  $name = $request->query("name");
  $email = $request->query("email");

/*
$validated = $request->validate([
  "name" => "required│string│min:3"
]);*/

$errors = "";

if (strlen($name) < 3){
  $errors .= "name";
}

if (strpos($email, "@") == false) {
  $errors .= " email";
}

if (strlen($errors) > 0){
 return response()->json([
  "invalid data" => $errors,
]);
}


  /*
  <input 
  type="text"
placeholder = "name"
name="name">
  */

$password = $request->query("password");
$date = $request->query("date");





return response()->json([
  "status" => "OK",
   "name" => $name,
  "date" => $date
]);




});



plygr blad ephp


<h1>Title is {{$title}}</h1>


<form action = "/submit-form">

@csrf

<input type="text"
placeholder = "name"
name="name">


<input type="text"
placeholder = "email"
name="email">

<input type="password"
placeholder = "password"
name="password">


<input type="date" name="date">

<button type="submit">Send</button>

</form>



admin blade php

<h1>Hello admin {{$name}}</h1>



users.blade.php


<h1>Users</h1>

<ul>
@foreach($users as $user)
    <li>{{$user}}</li>
@endforeach
</ul>

## Laravel simple registration


resources/views/web.php
```php
<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function(){ 
   return view("hello");
});


Route::post("/submit", function(Illuminate\Http\Request $request){
$name = $request->input('name');

DB::table("Users")->insert([ // already created at db
    "name" => $name,
    "email" => $name,
    "password" => $name
]);

$users = DB::table("Users")->get();
return view("users", ["users" => $users]);
});

Route::get("/users", function(){
    $users = DB::table("Users")->get();
    return view("users", ["users" => $users]);
});
```

hello.blade.php
```php
<h1>Hello</h1>

<form action="/submit" method="POST">
    @csrf
<input type="text" name="name">
<input type="submit">
</form>
```


users.php
```php
<h1>Users</h1>

@foreach ($users as $user)
    <p>{{ $user->name }}</p>
@endforeach
```


# Registration with user search

moor/routes/web.php
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// ------------------------------------- USER CONTROLLER
class UserController extends Controller{
    public function index(){
        $users = DB::table("Users")->get();
        return view("users", ["users" => $users]);
    }

    public function search(Request $request){
        $search = $request->input("search");
        $users = DB::table("Users")
            ->when($search, function ($query, $search) {
                return $query->where("name", "like", "%{$search}%");
            })
            ->get();

        return view("users", ["users" => $users]);
    }

    public function save(Request $request){
        $name = $request->input("name");

        DB::table("Users")->insert([
            // already created at db
            "name" => $name,
            "email" => $name,
            "password" => $name,
        ]);

        $users = DB::table("Users")->get();
        return view("users", ["users" => $users]);
    }
}

// ------------------------------------- ROUTES
Route::get("/all", "App\Http\Controllers\UserController@index");
Route::get("/users/search", "App\Http\Controllers\UserController@search");
Route::post("/submit", [UserController::class, "save"]);

Route::get("/", function () {
    return view("hello");
});

Route::get("/users", function () {
    $users = DB::table("Users")->get();
    return view("users", ["users" => $users]);
});

/*
Route::post("/submit", function(Request $request){
$name = $request->input('name');

$ctrl = UserController;
$ctrl.save($request);

$users = DB::table("Users")->get();
return view("users", ["users" => $users]);
});*/
```

moor/resources/views/hello.blade.php
```html
<h1>Hello</h1>

<form action="/submit" method="POST">
    @csrf
<input type="text" name="name">
<input type="submit">
</form>
```

moor/resources/views/users.blade.php
```html
<h1>Users</h1>

<form action="/users/search" method="get">
        <input type="text" name="search" placeholder="Search for users..">
        <input type="submit" value="Search">
</form>

@foreach ($users as $user)
    <p>{{ $user->name }}</p>
@endforeach
```

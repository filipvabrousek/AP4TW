## Laravel

routes/web.php
```php

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\Blueprint;

Route::get("/", function(){ // was /hello
   return view("hello");
});

Route::post("/submit", function(Illuminate\Http\Request $request){
$name = $request->input('name');

/*
if (!Schema::hasTable("dynamic")){
Schema::create('dynamic', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});
}*/
















DB::table("Race")->insert([ 
    "race" => $name
]);

DB::table("Users")->insert([ // already created at db
    "name" => $name, "email" => $name, "password" => $name
]);

$users = DB::table("Users")->get();
return view("users", ["users" => $users]);
});


Route::get("/users", function(){
    $users = DB::table("Users")->get();
    return view("users", ["users" => $users]);
});


Route::get("/races", function(){
    $races = DB::table("Race")->get();
    return view("races", ["races" => $races]);
});
```


resources/views/hello.blade.php
```php
<h1>Hello</h1>

<form action="/submit" method="POST">
    @csrf
<input type="text" name="name">
<input type="submit">
</form>
```

resources/views/users.blade.php

```php
<h1>Users</h1>

@foreach ($users as $user)
    <p>{{ $user->name }}</p>
@endforeach
```


resources/views/races.blade.php
```php
<h1>Races</h1>

@foreach ($races as $user)
    <p>{{ $user->race }}</p>
@endforeach
```



## GlobalController
```php
/*
class GlobalController extends Controller {
    public function index(){
        $users = DB::table('Users')->get();
        return view('users', ['users' => $users]);
    }

    public function save($name){
        DB::table("Users")->insert([ // already created at db
            "name" => $name,
            "email" => $name,
            "password" => $name
        ]);
    }
}*/

```






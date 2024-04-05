
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('Users')->get();
        return view('users', ['users' => $users]);
    }
}

Route::get("/all", 'App\Http\Controllers\UserController@index');


Route::get("/", function(){ 
   return view("hello");
});



Route::post("/submit", function(Request $request){
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


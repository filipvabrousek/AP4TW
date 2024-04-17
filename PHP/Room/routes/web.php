<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;


// ------------------------------------- USER CONTROLLER
class UserController extends Controller{
    public function index(){
        $users = DB::table("Users")->get();
        return view("users", ["users" => $users]);
    }

    public function search(Request $request){
        $search = $request->input("search");
        $name = $request->input("name");
        $posts =  DB::table("Posts")->get()->reverse();
        $users = DB::table("Users")
            ->when($search, function ($query, $search) {
                return $query->where("name", "like", "%{$search}%");
            })
            ->get();

        return view("users", ["users" => $users, "name" => $name, "posts" => $posts]);
    }

    public function searchPosts(Request $request){
        $search = $request->input("search");
        $users = DB::table("Posts")
            ->when($search, function ($query, $search) {
                return $query->where("name", "like", "%{$search}%");
            })
            ->get();

        return view("posts", ["posts" => $users]);
    }

    public function post(Request $request){
        $post = $request->input("post");
        DB::table("Posts")->insert([
            "name" => $name,
            "post" => $post
        ]);
    }

    public function login(Request $request){

        $name = $request->input("name");

        $users = DB::table("Users")->get()->reverse();



       /* $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)){
            echo "Login successful";
            return back();
        } else {
            echo "Login failed";
            return back();
        }
*/


  
     
       
        $currentUser = DB::table("Users")
            ->when($name, function ($query, $name) {
                return $query->where("name", "=", "$name");
            })
            ->get();

            $posts = DB::table("Posts")->get()->reverse();

            if ($currentUser){
              //  echo $currentUser;
                return view("users", [
                    "users" => $users,
                    "posts" => $posts, 
                    "name" => $currentUser[0]->name
                ]);
            } else {
                return back();
            }


       /* return view("users")
                ->with("name", $name)
                ->with("time", "31:00")
                ->with("users", $users);*/

           
              
            
            
          /*   return view("users", [
             "users" => $users,
             "posts" => $posts, 
             "name" => $name
         ]);*/

         return back();


        

    }

    public function save(Request $request){

        $validated = $request->validate([
            "name" => "required|max:20",
        ]);
        
        $name = $request->input("name");

        Config::set('storage.name', $name);
        $gotu = Config::get('storage.name', $name);
       // print($gotu);
     

      /*  $validated = $request->validateWithBag("post", [
            "name" => "required|max:20",
        ]);*/


       

        DB::table("Users")->insert([
            // already created at db
            "name" => $name,
            "email" => $name,
            "password" => $name,
        ]);

       // DB::insert("INSERT INTO Users (name, email, password) VALUES (?, ?, ?)", [$name, $name, $name]);


        $users = DB::table("Users")->get()->reverse();
       /* return view("users")
                ->with("name", $name)
                ->with("time", "31:00")
                ->with("users", $users);*/

              //  $users = DB::table("Users")->get();
    $posts = DB::table("Posts")->get()->reverse();
    return view("users", [
    "users" => $users,
    "posts" => $posts, 
    "name" => $name
]);

       // return view("users", ["users" => $users]);
    }
}

// ------------------------------------- ROUTES
Route::get("/all", "App\Http\Controllers\UserController@index");
Route::get("/users/search", "App\Http\Controllers\UserController@search");
Route::get("/posts/search", [UserController::class, "searchPosts"]);
Route::post("/submit", [UserController::class, "save"]);
Route::post("/login", [UserController::class, "login"]);
//Route::get("/posts", [UserController::class, "posts"]);
Route::get("/login", [UserController::class, "login"]);
Route::get("/", function () {
    return view("hello");
});


Route::get("/users", function (Request $request) {
    $name = Config::get('storage.name', "name");

    $users = DB::table("Users")->get()->reverse();
    $posts = DB::table("Posts")->get()->reverse();
   
    return view("users", [
    "users" => $users, 
    "posts" => $posts,
    "name" => $name]);
});

Route::post("/users", [UserController::class, "save"]);

Route::post("/posts", function (Request $request) {
    $content = $request->input("post");
    $name = $request->input("name");

   // echo $name;
    DB::table("Posts")->insert([
        // already created at db
        "user" => $name,
        "title" => $content,
        "body" => "body",
    ]);

    $posts = DB::table("Posts")->get()->reverse();
    $users = DB::table("Users")->get()->reverse();
    return view("users", ["users" => $users, "posts" => $posts, "name" => $name]);
});

Route::get("/posts", function (Request $request) {
    $name = view()->shared("name"); //Config::get('user.name');
    $posts = DB::table("Posts")->get()->reverse();
    $users = DB::table("Users")->get()->reverse();
    return view("users", ["users" => $users, "posts" => $posts, "name" => $name]);

});


/*
Route::get("/posts", function (Request $request) {
    $content = $request->input("post");
    $name = $request->input("name");

   // echo $name;
    DB::table("Posts")->insert([
        // already created at db
        "user" => $name,
        "title" => $content,
        "body" => "body",
    ]);

    $posts = DB::table("Posts")->get()->reverse();
    $users = DB::table("Users")->get()->reverse();
    return view("users", ["users" => $users, "posts" => $posts, "name" => $name]);
});*/



/*
Route::get("/posts", function() {
    $posts = DB::table("Posts")->get();
    return view("posts", ["posts" => $posts]);
});*/





/*
php artisan make:migration create_posts_table --create=posts

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
   
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}


php artisan migrate




*/




















/*
Route::post("/submit", function(Request $request){
$name = $request->input('name');

$ctrl = UserController;
$ctrl.save($request);

$users = DB::table("Users")->get();
return view("users", ["users" => $users]);
});*/


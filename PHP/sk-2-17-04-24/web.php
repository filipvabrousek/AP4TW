<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
Route::get('/', function () {
    return view('hello');
});*/

Route::get('/', function () {
    return view('register');
});

Route::get('/users', function () {
    $users = DB::table("Users")
    ->get()
    ->reverse();

    return view('users', ["users" => $users, "nick" => "Test"]);
});




Route::post("/submit", function(Request $request){

    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');

    DB::table("Users")->insert([
        "email" => $email,
        "password" => $password,
        "name" => $name
    ]);


    $users = DB::table("Users")
    ->get()
    ->reverse();

    return view('users', ["users" => $users, "nick" => $name]);



});
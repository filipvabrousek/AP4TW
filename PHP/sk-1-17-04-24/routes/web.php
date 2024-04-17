<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// http://127.0.0.1:8000/
Route::get('/', function () { 
    return view('hello');
});

Route::get('/register', function () {
    return view("register");
});

// http://127.0.0.1:8000/users
Route::get('/users', function () { 
    // Load data from database
    // Send the to view
    $users = DB::table('Users')
    ->get()
    ->reverse();

    return view('users', ["users"=>$users]);
});

// http://127.0.0.1:8000/submit

// <form action="/submit" method="POST">
//  => Route::post('/submit'
// $request contains form data
// $request->input("name"); <input ... name = "name" name="email"
Route::post('/submit', function (Request $request) { 

    // Get data from form
    // beware of name attribute
    $name = $request->input("name");
    $email = $request->input("email");
    $password = $request->input("password");

    DB::table('Users')
    ->insert([
        "email" => $email,
        "name" => $name,
        "password" => $password
    ]);

    // Load data from database
    $users = DB::table('Users')
    ->get()
    ->reverse();

    // Send the to view users.blade.php
    return view('users', ["users" => $users]);
});

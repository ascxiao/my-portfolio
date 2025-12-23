<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $ninjas = [
        ["name" => "mario", "skill" => 75, "id" => 1],
        ["name" => "luigi", "skill" => 32, "id" => 2]
    ];

    return view('test', ["greeting" => "hello", "ninjas" => $ninjas]);
});

Route::get('/projects', function () {
    return view('pages.projects');
});

Route::get('/certification', function () {
    return view('pages.certification');
});

Route::get('/show/{id}', function($id){
    return view('show', ["id" => $id]);
});
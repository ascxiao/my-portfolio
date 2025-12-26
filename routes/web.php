<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::get('/about_me', function () {
    return view('pages.about_me');
});

Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/certification', function () {
    return view('pages.certification');
});

Route::get('/devlogs', function () {
    return view('pages.devlogs');
});

Route::get('/case_study', function () {
    $test = [
        ['id'=>'1', 'title'=>'Sample Article', 'date'=>'December 1, 2025', 'img'=>'/images/sample.png', 'contents'=>'RAWRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR'],
    ];

    return view('pages.case_study', ['test' => $test]);
});

Route::get('/artworks', function () {
    return view('pages.artworks');
});

Route::get('/case/{id}', function($id){
    return view('pages.case', ["id" => $id]);
});

Route::get('/devlog', function(){
    return view('pages.devlog');
});

Route::get('/show/{id}', function($id){

    return view('show', ["id" => $id]);
});
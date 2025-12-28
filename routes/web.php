<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\DevlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', [HomeController::class, 'index']);

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

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

Route::get('/certification', [CertificationController::class, 'index'])->name('certificaation');

Route::get('/devlogs', [DevlogController::class, 'index'])->name('devlog');

Route::get('/case_study', [CaseStudyController::class, 'index'])->name('cases');

Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks');

Route::get('/case/{id}', [CaseStudyController::class, 'show'])->name('cases.show');

Route::get('/devlog/{id}',[DevlogController::class, 'show'])->name('devlogs.show');
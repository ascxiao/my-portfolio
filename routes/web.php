<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\DevlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

Route::get('/', [HomeController::class, 'index']);

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

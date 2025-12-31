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

Route::get('/certification', [CertificationController::class, 'index'])->name('certification');

Route::get('/devlogs', [DevlogController::class, 'index'])->name('devlog');

Route::get('/case_study', [CaseStudyController::class, 'index'])->name('cases');

Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks');

Route::get('/case/{id}', [CaseStudyController::class, 'show'])->name('cases.show');

Route::get('/devlog/{id}',[DevlogController::class, 'show'])->name('devlogs.show');

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/devlogs/create', [DevlogController::class, 'create'])->name('devlogs.create');
Route::post('/admin/devlogs', [DevlogController::class, 'store'])->name('devlogs.store');
Route::get('/admin/devlogs/{devlog}/edit', [DevlogController::class, 'edit'])->name('devlogs.edit');
Route::put('/admin/devlogs/{devlog}', [DevlogController::class, 'update'])->name('devlogs.update');
Route::delete('/admin/devlogs/del/{devlog}', [DevlogController::class, 'destroy'])->name('devlogs.destroy');
Route::get('/admin/devlogs', [DevlogController::class, 'admin_index'])->name('devlogs.index');

Route::get('/admin/certificates/create', [CertificationController::class, 'create'])->name('certificates.create');
Route::post('/admin/certificates', [CertificationController::class, 'store'])->name('certificates.store');
Route::get('/admin/certificates/{certificate}/edit', [CertificationController::class, 'edit'])->name('certificates.edit');
Route::put('/admin/certificates/{certificate}', [CertificationController::class, 'update'])->name('certificates.update');
Route::delete('/admin/certificates/del/{certificate}', [CertificationController::class, 'destroy'])->name('certificates.destroy');
Route::get('/admin/certificates', [CertificationController::class, 'admin_index'])->name('certificates.index');

Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/admin/projects/del/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::get('/admin/projects', [ProjectController::class, 'admin_index'])->name('projects.index');

require __DIR__.'/auth.php';

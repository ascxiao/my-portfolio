<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\DashboardController;
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

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/artworks/create', [ArtworkController::class, 'create'])->name('artworks.create');
Route::post('/admin/artworks', [ArtworkController::class, 'store'])->name('artworks.store');
Route::get('/admin/artworks/{artwork}/edit', [ArtworkController::class, 'edit'])->name('artworks.edit');
Route::put('/admin/artworks/{artwork}', [ArtworkController::class, 'update'])->name('artworks.update');
Route::delete('/admin/artworks/del/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy');
Route::get('/admin/artworks', [ArtworkController::class, 'admin_index'])->name('artworks.index');

Route::get('/admin/cases/create', [CaseStudyController::class, 'create'])->name('cases.create');
Route::post('/admin/cases', [CaseStudyController::class, 'store'])->name('cases.store');
Route::get('/admin/cases/{case}/edit', [CaseStudyController::class, 'edit'])->name('cases.edit');
Route::put('/admin/cases/{case}', [CaseStudyController::class, 'update'])->name('cases.update');
Route::delete('/admin/cases/del/{case}', [CaseStudyController::class, 'destroy'])->name('cases.destroy');
Route::get('/admin/cases', [CaseStudyController::class, 'admin_index'])->name('cases.index');

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

use Illuminate\Support\Facades\Storage;

Route::get('/debug-upload', function() {
    try {
        // 1. Force the S3 disk configuration to throw exceptions
        config(['filesystems.disks.s3.throw' => true]);

        // 2. Try to upload a test file
        echo "Attempting upload to bucket: " . config('filesystems.disks.s3.bucket') . "...<br>";
        
        $result = Storage::disk('s3')->put('debug_test.txt', 'This is a test from Render.');
        
        // 3. Check results
        if ($result) {
            return "✅ SUCCESS! File uploaded. Check your Supabase bucket now.";
        } else {
            return "❌ FAILED. The upload returned 'false' but gave no error message.";
        }
    } catch (\Exception $e) {
        // 4. CATCH THE ERROR
        return "<h1>💥 ERROR DETECTED 💥</h1>" .
               "<strong>Type:</strong> " . get_class($e) . "<br>" .
               "<strong>Message:</strong> " . $e->getMessage();
    }
});

require __DIR__.'/auth.php';

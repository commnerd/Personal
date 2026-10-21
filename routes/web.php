<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', fn() => view('index'))->name('home');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/resume', fn() => view('resume'))->name('resume');
Route::get('/resume/download', function () {
    $pdf = Pdf::loadView('resume-pdf');

    return $pdf->download('michael-j-miller-resume.pdf');
})->name('resume.download');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::name('admin.')->prefix('admin')->group(function() {
        Route::inertia('', 'Admin/Index')->name('admin');
        Route::resource('/blog', \App\Http\Controllers\Admin\BlogPostController::class);
    });
});

require __DIR__.'/settings.php';

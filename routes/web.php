<?php

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Socialite;

Route::get('/', fn() => view('index'))->name('home');
Route::get('/resume', fn() => view('resume'))->name('resume');
Route::get('/login', fn() => Socialite::driver('google')->redirect())->name('login');
Route::get('/login/callback', function() {
    if($user = User::where('email', Socialite::driver('google')->user()->email)->first()) {
        Auth::login($user, remember: true);
        return redirect()->route('dashboard');
    }
    return redirect()->route('home');
});
Route::get('/resume/download', function () {
    $pdf = Pdf::loadView('resume-pdf');

    return $pdf->download('michael-j-miller-resume.pdf');
})->name('resume.download');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

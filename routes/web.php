<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Link to Index page at "/"
Route::get('/', function () {
    return view('index');
});

// Link to About page at "/about"
Route::get('/about', function () {
    return view('about');
});

// Link to Contact page at "/contact"
Route::get('/contact', function () {
    return view('contact');
});

// Link to Dashboard page at "/dashboard"
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

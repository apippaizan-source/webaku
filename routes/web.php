<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\User\WisataController as UserWisataController;
use Illuminate\Support\Facades\Route;

// Halaman Home
Route::get('/', [UserWisataController::class, 'index'])->name('home');

// HALAMAN ABOUT (Pastikan diluar group auth)
Route::get('/about', function () {
    return view('user.about'); 
})->name('about');

// Route Admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('wisata', WisataController::class);
});

// Auth & Dashboard bawaan
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
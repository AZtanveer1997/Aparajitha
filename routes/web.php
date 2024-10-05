<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
require __DIR__.'/auth.php';

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard');

// Entry Management Routes
Route::middleware('auth')->group(function () {
    Route::resource('entries', EntryController::class); 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

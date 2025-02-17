<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BabController;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\CheckHearts;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome'); // Adjust to your actual guest homepage
    })->name('home');
});

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');

    Route::get('/bermain', [BabController::class, 'index'])->name('bermain.index');
    Route::get('/bermain/{slug}', [BabController::class, 'show'])->name('bermain.show');

    Route::get('/belajar', [BelajarController::class, 'index'])->name('belajar.index');
    Route::get('/belajar/{slug}', [BelajarController::class, 'show'])->name('belajar.show');
});

Route::middleware(['auth', CheckHearts::class])->group(function () {
    Route::get('/quiz/{slug}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{slug}/answer', [QuizController::class, 'submitAnswer'])->name('quiz.answer');
});

// Auth Routes (Login, Register, etc.)
require __DIR__ . '/auth.php';

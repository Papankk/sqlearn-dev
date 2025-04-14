<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BabController;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBabController;
use App\Http\Controllers\AdminMateriController;
use App\Http\Controllers\AdminSoalController;
use App\Http\Controllers\AdminSesiController;
use App\Http\Controllers\AdminUserController;
use App\Http\Middleware\CheckHearts;
use App\Http\Middleware\CheckSessionAccess;
use App\Http\Middleware\CheckUserAccess;

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

    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');

    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::post('/topup', [ShopController::class, 'createTransaction'])->name('shop.topup');
    Route::post('/refill-heart', [ShopController::class, 'refillHeart']);
});

Route::middleware(['auth', CheckHearts::class, CheckSessionAccess::class])->group(function () {
    Route::get('/quiz/{slug}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{slug}/answer', [QuizController::class, 'submitAnswer'])->name('quiz.answer');
    Route::post('/quiz/{slug}/final-answer', [QuizController::class, 'submitFinalAnswer'])->name('quiz.final-answer');
});

Route::middleware(['auth', 'verified', CheckUserAccess::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/chart/user-registrations', [AdminController::class, 'getUserRegistrations']);

    Route::get('/kelola-bab', [AdminBabController::class, 'index'])->name('bab.index');
    Route::post('/admin/bab/store', [AdminBabController::class, 'store'])->name('bab.store');
    Route::put('/bab/{id}', [AdminBabController::class, 'update'])->name('bab.update');
    Route::delete('/bab/{id}', [AdminBabController::class, 'destroy'])->name('bab.destroy');

    Route::get('/kelola-soal', [AdminSoalController::class, 'index'])->name('soal.index');
    Route::post('/admin/soal/store', [AdminSoalController::class, 'store'])->name('soal.store');
    Route::put('/soal/{id}', [AdminSoalController::class, 'update'])->name('soal.update');
    Route::delete('/soal/{id}', [AdminSoalController::class, 'destroy'])->name('soal.destroy');

    Route::get('/kelola-materi', [AdminMateriController::class, 'index'])->name('materi.index');
    Route::post('/admin/materi/store', [AdminMateriController::class, 'store'])->name('materi.store');
    Route::put('/materi/{id}', [AdminMateriController::class, 'update'])->name('materi.update');
    Route::delete('/materi/{id}', [AdminMateriController::class, 'destroy'])->name('materi.destroy');

    Route::get('/kelola-sesi', [AdminSesiController::class, 'index'])->name('sesi.index');
    Route::post('/admin/sesi/store', [AdminSesiController::class, 'store'])->name('sesi.store');
    Route::put('/sesi/{id}', [AdminSesiController::class, 'update'])->name('sesi.update');
    Route::delete('/sesi/{id}', [AdminSesiController::class, 'destroy'])->name('sesi.destroy');

    Route::get('/kelola-user', [AdminUserController::class, 'index'])->name('user.index');
    Route::put('/user/{id}', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [AdminUserController::class, 'destroy'])->name('user.destroy');
});

// Auth Routes (Login, Register, etc.)
require __DIR__ . '/auth.php';

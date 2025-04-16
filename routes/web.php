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

// Route untuk tamu yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome'); // Halaman utama untuk pengguna guest
    })->name('home');
});

// Route untuk pengguna yang sudah login dan sudah verifikasi email
Route::middleware(['auth', 'verified'])->group(function () {
    // Profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Halaman profil pengguna (custom)
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');

    // Halaman bermain - daftar bab & detail bab
    Route::get('/bermain', [BabController::class, 'index'])->name('bermain.index');
    Route::get('/bermain/{slug}', [BabController::class, 'show'])->name('bermain.show');

    // Halaman belajar - daftar materi & detail materi
    Route::get('/belajar', [BelajarController::class, 'index'])->name('belajar.index');
    Route::get('/belajar/{slug}', [BelajarController::class, 'show'])->name('belajar.show');

    // Leaderboard
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');

    // Toko / shop
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::post('/topup', [ShopController::class, 'createTransaction'])->name('shop.topup');
    Route::post('/refill-heart', [ShopController::class, 'refillHeart']);
});

// Route untuk kuis yang hanya bisa diakses jika sudah login, punya hati, dan punya akses sesi
Route::middleware(['auth', CheckHearts::class, CheckSessionAccess::class])->group(function () {
    Route::get('/quiz/{slug}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{slug}/answer', [QuizController::class, 'submitAnswer'])->name('quiz.answer');
    Route::post('/quiz/{slug}/final-answer', [QuizController::class, 'submitFinalAnswer'])->name('quiz.final-answer');
});

// Route untuk admin yang sudah login, verifikasi, dan memiliki hak akses admin
Route::middleware(['auth', 'verified', CheckUserAccess::class])->group(function () {
    // Dashboard admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/chart/user-registrations', [AdminController::class, 'getUserRegistrations']);

    // Manajemen bab
    Route::get('/kelola-bab', [AdminBabController::class, 'index'])->name('bab.index');
    Route::post('/admin/bab/store', [AdminBabController::class, 'store'])->name('bab.store');
    Route::put('/bab/{id}', [AdminBabController::class, 'update'])->name('bab.update');
    Route::delete('/bab/{id}', [AdminBabController::class, 'destroy'])->name('bab.destroy');

    // Manajemen soal
    Route::get('/kelola-soal', [AdminSoalController::class, 'index'])->name('soal.index');
    Route::post('/admin/soal/store', [AdminSoalController::class, 'store'])->name('soal.store');
    Route::put('/soal/{id}', [AdminSoalController::class, 'update'])->name('soal.update');
    Route::delete('/soal/{id}', [AdminSoalController::class, 'destroy'])->name('soal.destroy');

    // Manajemen materi
    Route::get('/kelola-materi', [AdminMateriController::class, 'index'])->name('materi.index');
    Route::post('/admin/materi/store', [AdminMateriController::class, 'store'])->name('materi.store');
    Route::put('/materi/{id}', [AdminMateriController::class, 'update'])->name('materi.update');
    Route::delete('/materi/{id}', [AdminMateriController::class, 'destroy'])->name('materi.destroy');

    // Manajemen sesi
    Route::get('/kelola-sesi', [AdminSesiController::class, 'index'])->name('sesi.index');
    Route::post('/admin/sesi/store', [AdminSesiController::class, 'store'])->name('sesi.store');
    Route::put('/sesi/{id}', [AdminSesiController::class, 'update'])->name('sesi.update');
    Route::delete('/sesi/{id}', [AdminSesiController::class, 'destroy'])->name('sesi.destroy');

    // Manajemen pengguna
    Route::get('/kelola-user', [AdminUserController::class, 'index'])->name('user.index');
    Route::put('/user/{id}', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [AdminUserController::class, 'destroy'])->name('user.destroy');
});

// Route untuk autentikasi (login, register, lupa password, dll)
require __DIR__ . '/auth.php';

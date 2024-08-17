<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestAnalysisController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route untuk halaman utama (landing page)
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route untuk halaman dashboard, hanya bisa diakses oleh user dengan role "Quality Control"
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'requestAnalysisUrl' => route('request.analysis.create'),
    ]);
})->middleware(['auth', 'verified', 'role_check:quality_control'])->name('dashboard');

// Group route untuk user yang sudah terautentikasi dengan role "Quality Control"
Route::middleware(['auth', 'role_check:quality_control'])->group(function () {

    // Route untuk profile user (edit, update, delete)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk request analysis (create dan store)
    Route::get('/request-analysis', [RequestAnalysisController::class, 'create'])->name('request.analysis.create');
    Route::post('/request-analysis', [RequestAnalysisController::class, 'store'])->name('request.analysis.store');
});

// Memuat file routes untuk autentikasi (login, register, dll.)
require __DIR__.'/auth.php';


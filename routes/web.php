<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;

Route::get('/', function () {
    return view('home');
});

// --- Grup Route Khusus Untuk Admin ---
// Semua route di dalam grup ini akan:
// 1. Memiliki URL diawali dengan /admin (prefix)
// 2. Dilindungi oleh middleware 'auth' (harus login) dan 'admin' (harus role admin)
// 3. Memiliki nama route diawali dengan 'admin.' (misal: admin.dashboard)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('guru', GuruController::class);


    Route::resource('berita', BeritaController::class);
});

require __DIR__.'/auth.php';

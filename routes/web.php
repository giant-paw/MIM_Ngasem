<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KategoriController;

Route::get('/', function () {
    return view('home');
})->name('home');

// --- Grup Route Khusus Untuk Admin ---
// Semua route di dalam grup ini akan:
// 1. Memiliki URL diawali dengan /admin (prefix)
// 2. Dilindungi oleh middleware 'auth' (harus login) dan 'admin' (harus role admin)
// 3. Memiliki nama route diawali dengan 'admin.' (misal: admin.dashboard)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('guru', GuruController::class);

    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);

    Route::resource('users', UserController::class);

    Route::resource('kategori', KategoriController::class);

    Route::post('/berita/upload-trix', [BeritaController::class, 'uploadTrixImage'])->name('berita.upload-trix');
});

// USER 

// Halaman Berita
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');

// Halaman Berita
Route::get('/portal-berita', [PublicController::class, 'portalBerita'])->name('portal.index');

// Halaman Tahfidz
Route::get('/tahfidz', function () {
    return view('tahfidz');
})->name('tahfidz.index');

// Halaman Tari
Route::get('/tari', function () {
    return view('tari');
})->name('tari.index');

// Halaman Hizbul Wathan
Route::get('/hizbul', function () {
    return view('hizbul');
})->name('hizbul.index');

// Halaman Drum Band
Route::get('/band', function () {
    return view('band');
})->name('band.index');

// Halaman VOLI
Route::get('/voli', function () {
    return view('voli');
})->name('voli.index');

// Route::get('/data-guru', function () {
//     return view('dataguru');
// })->name('dataguru.index');

Route::get('/data-guru', [PublicController::class, 'dataGuru'])->name('dataguru.index');

Route::get('/tentang-kami', function () {
    return view('about');
})->name('about.index');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KatalogController;

Route::get('/', [KatalogController::class, 'index'])->name('katalog.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// 1. GRUP PERTAMA: Siapa saja yang sudah LOGIN boleh masuk
Route::middleware('auth')->group(function () {
    // Pelanggan DAN Admin bisa akses ini
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Halaman untuk melihat form
    Route::get('/admin/produk/tambah', function () {
        return view('admin.tambah_produk');
    })->name('produk.tambah');

    // Perintah untuk menyimpan data yang dikirim dari form
    Route::post('/admin/produk', [ProductController::class, 'store'])->name('produk.simpan');

    // Halaman untuk melihat semua produk
    Route::get('/admin/produk', [ProductController::class, 'index'])->name('produk.index');

    Route::delete('/admin/produk/{product}', [ProductController::class, 'destroy'])->name('produk.destroy');

    // Halaman form edit
    Route::get('/admin/produk/{product}/edit', [ProductController::class, 'edit'])->name('produk.edit');

    // Proses simpan perubahan
    Route::put('/admin/produk/{product}', [ProductController::class, 'update'])->name('produk.update');
});

require __DIR__ . '/auth.php';

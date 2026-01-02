<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

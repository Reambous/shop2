<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil SEMUA data dari tabel produk
        $semua_produk = \App\Models\Product::all();

        // Kirim data ke tampilan (view)
        return view('admin.daftar_produk', compact('semua_produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi (Opsional tapi baik: pastikan yang diupload itu gambar)
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Ambil semua data inputan kecuali foto
        $data = $request->all();

        // 3. Proses Upload Foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('produk', $nama_file, 'public'); // Simpan ke storage
            $data['foto'] = $nama_file; // Masukkan nama file ke array data
        }

        // 4. Simpan ke database
        \App\Models\Product::create($data);

        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.edit_produk', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('produk.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Perintah sakti untuk menghapus data
        $product->delete();

        // Kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}

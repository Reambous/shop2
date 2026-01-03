<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class KatalogController extends Controller
{
    public function index()
    {
        // Mengambil semua produk dari database
        $products = Product::where('stok', '>', 0)->get();

        // Mengirim data ke view katalog
        return view('katalog', compact('products'));
    }

    public function show(Product $product)
    {
        // Kita tampilkan halaman detail dan kirim data produknya
        return view('detail_produk', compact('product'));
    }
}

<!DOCTYPE html>
<html>

<head>
    <title>Katalog Toko Kita</title>
    <style>
        .container {
            width: 80%;
            margin: auto;
            font-family: sans-serif;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }

        .harga {
            color: green;
            font-weight: bold;
        }

        .stok {
            font-size: 0.8em;
            color: #666;
        }

        .btn-beli {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <nav style="background: #eee; padding: 10px; margin-bottom: 20px; display: flex; gap: 15px;">
        <a href="/dashboard" style="color: green; font-weight: bold;">🏠 Dashboard Utama</a>
        <a href="{{ route('katalog.index') }}" style="color: green; font-weight: bold;">🏠 Katalog Produk</a>
    </nav>
    <div class="container">
        <h1>Katalog Produk</h1>
        <hr>

        <div class="grid">
            @foreach ($products as $produk)
                <div class="card">
                    <h3>{{ $produk->nama_produk }}</h3>
                    <p>{{ $produk->deskripsi }}</p>
                    <p class="harga">Rp {{ number_format($produk->harga) }}</p>
                    <p class="stok">Tersisa: {{ $produk->stok }} unit</p>

                    <a href="#" class="btn-beli">Tambah ke Keranjang</a>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Produk</title>
</head>

<body>
    <nav style="background: #eee; padding: 10px; margin-bottom: 20px;">
        <a href="{{ route('produk.index') }}" style="margin-right: 15px;">Lihat Semua Produk</a>
        <a href="{{ route('produk.tambah') }}" style="font-weight: bold;">Tambah Produk Baru</a>
    </nav>

    <h1>Form Tambah Produk</h1>
    <form action="{{ route('produk.simpan') }}" method="POST">
        @csrf <input type="text" name="nama_produk" placeholder="Nama Barang">
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <input type="number" name="harga" placeholder="Harga">
        <input type="number" name="stok" placeholder="Stok">
        <button type="submit">Simpan Produk</button>
    </form>

</body>

</html>

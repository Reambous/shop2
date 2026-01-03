<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Edit Produk</title>
</head>

<body>
    <nav style="background: #eee; padding: 10px; margin-bottom: 20px;">
        <a href="{{ route('produk.index') }}">Kembali ke Daftar</a>
    </nav>

    <h1>Edit Produk: {{ $product->nama_produk }}</h1>

    <form action="{{ route('produk.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') <input type="text" name="nama_produk" value="{{ $product->nama_produk }}">
        <textarea name="deskripsi">{{ $product->deskripsi }}</textarea>
        <input type="number" name="harga" value="{{ $product->harga }}">
        <input type="number" name="stok" value="{{ $product->stok }}">
        <label>Foto Produk:</label>
        <input type="file" name="foto">
        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>

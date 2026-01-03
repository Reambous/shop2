<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Produk</title>
</head>

<body>
    <nav style="background: #eee; padding: 10px; margin-bottom: 20px; display: flex; gap: 15px;">
        <a href="/dashboard" style="color: green; font-weight: bold;">🏠 Dashboard Utama</a>
        <a href="{{ route('produk.index') }}">📦 Lihat Semua Produk</a>
        <a href="{{ route('produk.tambah') }}">➕ Tambah Produk Baru</a>
    </nav>

    <h1>Daftar Barang Toko</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semua_produk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>Rp {{ number_format($item->harga) }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <a href="{{ route('produk.edit', $item->id) }}"
                            style="color: orange; margin-right: 10px;">Edit</a>
                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Yakin mau hapus?')">
                            @csrf
                            @method('DELETE') <button type="submit" style="color: red;">Hapus</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

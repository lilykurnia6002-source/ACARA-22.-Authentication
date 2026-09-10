<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Minimarket POS</title>
</head>
<body>

    <h1>Selamat Datang di Sistem Informasi Minimarket</h1>
    <p>Halo <strong>{{ $nama_pegawai ?? 'Kasir' }}</strong>, Anda bertugas pada shift: <strong>{{ $shift ?? 'Pagi' }}</strong>.</p>

    <h3>Menu Navigasi Minimarket:</h3>
    <ul>
        <li><a href="{{ route('kasir.transaksi') }}">Transaksi Kasir</a></li>
        <li><a href="{{ route('admin.produk') }}">Kelola Produk Admin</a></li>
        <li><a href="{{ route('admin.kategori') }}">Kelola Kategori</a></li>
        <li><a href="{{ url('/produk-toko') }}">Daftar Stok Produk</a></li>
    </ul>

    <hr>
    <p><small>&copy; 2026 Dashboard Minimarket POS</small></p>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekap Statistik Penjualan</title>
</head>
<body>
    <h1>Laporan Rekap Statistik Penjualan</h1>
    <p><strong>Periode:</strong> {{ $statistik['periode'] }}</p>
    
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Total Transaksi</th>
            <td>{{ $statistik['total_transaksi'] }} Transaksi</td>
        </tr>
        <tr>
            <th>Total Pendapatan</th>
            <td>Rp {{ number_format($statistik['total_pendapatan'], 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Produk Terlaris</th>
            <td>{{ $statistik['produk_terlaris'] }}</td>
        </tr>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Minimarket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #1b8a5a;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 75vh;
            text-align: center;
            padding: 0 20px;
        }
        .title {
            color: #1b8a5a;
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .subtitle {
            font-size: 15px;
            color: #444;
            margin-bottom: 8px;
        }
        .description {
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
        }
        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        .btn {
            display: inline-block;
            background-color: #1b8a5a;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            border: none;
        }
        .btn:hover {
            background-color: #146c46;
        }
    </style>
</head>
<body>

    <div class="navbar">
        MINIMARKET
    </div>

    <div class="container">
        <div class="title">Selamat Datang di Minimarket</div>
        <div class="subtitle">Sistem Informasi Kasir Minimarket</div>
        <div class="description">Kelola produk dan transaksi dengan lebih mudah.</div>

        <div class="button-group">
            <a href="/about" class="btn">Tentang Pengembang</a>
            <a href="{{ route('dashboard') }}" class="btn">Dashboard Admin</a>
        </div>
    </div>

</body>
</html>
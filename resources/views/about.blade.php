<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Pengembang</title>
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
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }
        .card {
            background: white;
            padding: 35px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .card h2 {
            color: #1b8a5a;
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
        }
        .info-group {
            margin-bottom: 12px;
            font-size: 14px;
            color: #333333;
        }
        .info-group strong {
            display: inline-block;
            width: 120px;
        }
        .description {
            margin-top: 20px;
            margin-bottom: 25px;
            font-size: 13px;
            color: #555555;
            line-height: 1.5;
        }
        .btn-home {
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
        .btn-home:hover {
            background-color: #146c46;
        }
    </style>
</head>
<body>

    <div class="navbar">
        MINIMARKET
    </div>

    <div class="container">
        <div class="card">
            <h2>Tentang Pengembang</h2>
            
            <div class="info-group">
                <strong>Nama:</strong> Lili Kurnia Putri
            </div>
            <div class="info-group">
                <strong>Program Studi:</strong> D4 Teknik Informatika
            </div>
            <div class="info-group">
                <strong>Jurusan:</strong> Teknologi Informasi
            </div>
            <div class="info-group">
                <strong>Institusi:</strong> Politeknik Negeri Jember
            </div>

            <div class="description">
                Halaman ini dibuat sebagai bagian dari latihan Laravel mengenai Routes dan Views.
            </div>

            <a href="/" class="btn-home">Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>
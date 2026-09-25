<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Praktikum - Eloquent ORM</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .badge-pill { font-size: 0.85rem; padding: 0.5em 1em; border-radius: 20px; }
        pre { background: #1e1e2e; color: #a6adc8; border-radius: 10px; padding: 15px; }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Header Card -->
                <div class="card card-custom mb-4 bg-primary text-white p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1 text-white-50"><i class="fa-solid fa-graduation-cap me-2"></i>BKPM ACARA 19</h5>
                            <h3 class="fw-bold mb-0">{{ $title }}</h3>
                        </div>
                        <span class="badge bg-light text-primary badge-pill fw-bold">{{ $badge }}</span>
                    </div>
                </div>

                <!-- Status Output Card -->
                <div class="card card-custom p-4 mb-4">
                    <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                        <i class="fa-solid fa-circle-check fs-4 me-3"></i>
                        <div>
                            <strong>Pengujian Berhasil!</strong><br>
                            {{ $message }}
                        </div>
                    </div>

                    <h5 class="fw-bold text-secondary mb-3"><i class="fa-solid fa-database me-2"></i>Data Output Response</h5>
                    
                    <pre><code>{{ json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</code></pre>

                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                        <small class="text-muted"><i class="fa-solid fa-clock me-1"></i> Status: 200 OK</small>
                        <a href="/test-mass-assignment" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-rotate me-1"></i> Refresh Test</a>
                    </div>
                </div>

                <!-- Navigation Quick Links -->
                <div class="d-flex gap-2 justify-content-center">
                    <a href="/test-mass-assignment" class="btn btn-primary rounded-pill px-3 btn-sm"><i class="fa-solid fa-bolt me-1"></i> Mass Assignment</a>
                    <a href="/test-soft-deletes" class="btn btn-danger rounded-pill px-3 btn-sm"><i class="fa-solid fa-trash-can me-1"></i> Soft Deletes</a>
                    <a href="/test-scope" class="btn btn-success rounded-pill px-3 btn-sm"><i class="fa-solid fa-filter me-1"></i> Query Scope</a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
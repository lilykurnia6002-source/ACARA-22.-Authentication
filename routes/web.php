<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

// ==========================================
// LANGKAH 1 & 4: Rute Utama (Dashboard POS)
// ==========================================
Route::get('/', function () {
    return view('dashboard_pos', [
        'nama_pegawai' => 'Budi Santoso',
        'shift' => 'Pagi (08:00 - 15:00)'
    ]);
});

// ==========================================
// LANGKAH 1: Rute dengan Parameter
// ==========================================
Route::get('/produk/{id}', function ($id) {
    return 'Menampilkan data produk dengan ID: ' . $id;
});

Route::get('/produk/cari/{nama?}', function ($nama = null) {
    if ($nama) {
        return 'Hasil pencarian produk: ' . $nama;
    }
    return 'Silakan masukkan kata kunci pencarian pada URL (contoh: /produk/cari/sabun)';
});

// ==========================================
// LANGKAH 2: Route Groups & Prefix
// ==========================================
Route::prefix('admin')->group(function () {
    Route::get('/produk', function () {
        return 'Halaman Kelola Produk (Hanya Admin)';
    })->name('admin.produk');

    Route::get('/kategori', function () {
        return 'Halaman Kelola Kategori Produk (Hanya Admin)';
    })->name('admin.kategori');
});

Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {
        return 'Halaman Input Transaksi Penjualan (Kasir)';
    })->name('kasir.transaksi');
});

// ==========================================
// TUGAS EVALUASI: Rute Daftar Produk (5 Data)
// ==========================================
Route::get('/produk-toko', function () {
    $data_produk = [
        [
            'nama_produk' => 'Beras Raja 5kg',
            'sku' => 'BRG-001',
            'harga' => 68000,
            'stok' => 15,
            'gambar' => 'beras.jpg'
        ],
        [
            'nama_produk' => 'Minyak Goreng Bimoli 2L',
            'sku' => 'BRG-002',
            'harga' => 35000,
            'stok' => 20,
            'gambar' => 'minyak.jpg'
        ],
        [
            'nama_produk' => 'Gula Pasir Gulaku 1kg',
            'sku' => 'BRG-003',
            'harga' => 17500,
            'stok' => 30,
            'gambar' => 'gula.jpg'
        ],
        [
            'nama_produk' => 'Telur Ayam 1kg',
            'sku' => 'BRG-004',
            'harga' => 28000,
            'stok' => 25,
            'gambar' => 'telur.jpg'
        ],
        [
            'nama_produk' => 'Kecap Manis Bango 520ml',
            'sku' => 'BRG-005',
            'harga' => 22000,
            'stok' => 18,
            'gambar' => 'kecap.jpg'
        ],
    ];

    return view('daftar_produk', ['produk' => $data_produk]);
});

// Routing ke ProdukController
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
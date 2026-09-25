<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\FormController;
use App\Models\User;


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

// Routing ke Controller
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/laporan', LaporanPenjualanController::class);

Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class, 'submitForm']);

// ==========================================
// ACARA 19 - ELOQUENT ORM (PART 2)
// ==========================================

// Poin 1: Conditional Clause
Route::get('/acara19/conditional', function () {
    $usersWhere = User::where('status', 'active')->get();$usersOrWhere = User::where('status', 'active')->orWhere('role', 'admin')->get();
    $usersBetween = User::whereBetween('age', [18, 30])->get();$usersIn = User::whereIn('role', ['admin', 'editor'])->get();
    $usersNull = User::whereNull('deleted_at')->get();$usersNotNull = User::whereNotNull('email_verified_at')->get();

    $role = 'admin';
    $usersWhen = User::when($role, function ($query,$role) {
        return $query->where('role',$role);
    })->get();

    return "Langkah 1: Conditional Clause Berhasil Dijalankan!";
});

// Poin 3: Test Accessor
Route::get('/test-accessor', function () {
    $user = User::find(1);
    
    if ($user) {
        return "Full Name: " . $user->full_name;
    } else {
        return "User dengan ID 1 tidak ditemukan.";
    }
});

// ==========================================
// ROUTE DASHBOARD PENGUJIAN ELOQUENT (UI/UX)
// ==========================================

// Poin 4: Soft Deletes Testing
Route::get('/test-soft-deletes', function () {
    $user = User::first();$statusMsg = "Menampilkan data uji soft delete.";

    if ($user) {
        $user->delete();$statusMsg = "User ID {$user->id} berhasil di-Soft Delete (SoftDeletes Trait Aktif)!";
    }

    $trashedCount = User::onlyTrashed()->count();$activeCount = User::count();

    return view('test-result', [
        'title' => 'Poin 4: Soft Deletes Testing',
        'badge' => 'SoftDeletes Trait',
        'message' => $statusMsg,
        'data' => [
            'Total Active Users' => $activeCount,
            'Total Soft Deleted Users' => $trashedCount,
            'Sample Soft Deleted User' => User::onlyTrashed()->first()
        ]
    ]);
});

// Poin 5: Mass Assignment Protection
Route::get('/test-mass-assignment', function () {
    $user = User::create([
        'name'     => 'User Mass Assignment',
        'email'    => 'mass_' . time() . '@example.com',
        'password' => 'password123'
    ]);

    return view('test-result', [
        'title' => 'Poin 5: Mass Assignment Protection',
        'badge' => 'Mass Assignment ($fillable)',
        'message' => 'Data pengguna baru berhasil disimpan ke database secara massal!',
        'data' => $user
    ]);
});

// Poin 6: Query Scopes
Route::get('/test-scope', function () {
    $activeUsers = User::active()->get();

    return view('test-result', [
        'title' => 'Poin 6: Query Scopes (Local Scope)',
        'badge' => 'scopeActive()',
        'message' => 'Query scope `scopeActive` berhasil dijalankan pada model User!',
        'data' => $activeUsers
    ]);
});
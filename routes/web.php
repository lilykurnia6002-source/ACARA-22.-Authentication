<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\FormController;
use App\Models\User;
use Illuminate\Support\Facades\DB; 
use App\Models\Order;


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

// ==========================================
// ACARA 17 - QUERY BUILDER
// ==========================================

// 1) Pengenalan & Pembuatan Data Baru
Route::get('/acara17/poin1', function () {
    // Contoh Insert Data
    DB::table('users')->insert([
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'password' => bcrypt('password123')
    ]);

    // Insert dan Mendapatkan ID yang Dihasilkan
    $id = DB::table('users')->insertGetId([
        'name' => 'Jane Doe',
        'email' => 'janedoe@example.com',
        'password' => bcrypt('password123')
    ]);

    return "Poin 1 Berhasil! ID yang dihasilkan: " . $id;
});

// 2) Mengambil Data Dari Database
Route::get('/acara17/poin2', function () {
    $users = DB::table('users')->get();
    $user = DB::table('users')->where('email', 'johndoe@example.com')->first();
    $usersSelect = DB::table('users')->select('id', 'name')->get();
    $usersMultiWhere = DB::table('users')
        ->where('status', 'active')
        ->where('role', 'admin')
        ->get();
    $usersOperator = DB::table('users')->where('age', '>', 18)->get();

    return dd($users);
});

// 3) Memperbarui Data
Route::get('/acara17/poin3', function () {
    DB::table('users')
        ->where('email', 'johndoe@example.com')
        ->update(['status' => 'inactive']);

    DB::table('users')->where('id', 1)->increment('points', 10);
    DB::table('users')->where('id', 1)->decrement('points', 5);

    return "Poin 3 Berhasil di-update!";
});

// 4) Menghapus Data
Route::get('/acara17/poin4', function () {
    DB::table('users')->where('email', 'johndoe@example.com')->delete();

    return "Poin 4 Berhasil dihapus!";
});

// 5) Mengambil Daftar Nilai Kolom
Route::get('/acara17/poin5', function () {
    $names = DB::table('users')->pluck('name');
    $usersMap = DB::table('users')->pluck('name', 'email');

    return dd($names);
});

// 6) Agregat
Route::get('/acara17/poin6', function () {
    $totalUsers = DB::table('users')->count();
    $totalPoints = DB::table('users')->sum('points');
    $averageAge = DB::table('users')->avg('age');
    $maxPoints = DB::table('users')->max('points');
    $minPoints = DB::table('users')->min('points');

    return "Total Users: " . $totalUsers . ", Total Points: " . $totalPoints;
});

// 7) Join (Menggabungkan Tabel)
Route::get('/acara17/poin7', function () {
    $usersJoin = DB::table('users')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.name', 'orders.total_price')
        ->get();

    $usersLeftJoin = DB::table('users')
        ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        ->get();

    return dd($usersLeftJoin);
});

// 8) Pengurutan, Limit, dan Offset
Route::get('/acara17/poin8', function () {
    $usersOrder = DB::table('users')->orderBy('name', 'asc')->get();
    $usersLimit = DB::table('users')->limit(10)->get();
    $usersOffset = DB::table('users')->offset(10)->limit(10)->get();

    return dd($usersOrder);
});

// 9) Subquery (Query di dalam Query)
Route::get('/acara17/poin9', function () {
    $users = DB::table('users')
        ->select('name')
        ->selectSub(function ($query) {
            $query->from('orders')->selectRaw('count(*)')
                ->whereColumn('orders.user_id', 'users.id');
        }, 'order_count')
        ->get();

    return dd($users);
});

// 10) Query Raw (Raw SQL)
Route::get('/acara17/poin10', function () {
    $usersRawSelect = DB::table('users')
        ->selectRaw('COUNT(*) as total_users, status')
        ->groupBy('status')
        ->get();

    $usersRawWhere = DB::table('users')
        ->whereRaw('age > ? AND status = ?', [18, 'active'])
        ->get();

    return dd($usersRawSelect);
});

// ==========================================
// ACARA 18 - ELOQUENT ORM
// ==========================================

// 1) Read / Get Data dengan Eloquent
Route::get('/acara18/poin1', function () {
    $allUsers = User::all();
    return dd($allUsers);
});

// 2) Insert / Create Data Baru
Route::get('/acara18/poin2', function () {
    $user = new User();
    $user->name = 'Siti Aminah';
    $user->email = 'siti' . rand(1, 999) . '@example.com'; // Biar emailnya unik terus
    $user->password = 'password123';
    $user->save();

    return "Poin 2 Berhasil: User baru dibuat dengan ID " . $user->id;
});

// 3) Update Data dengan Eloquent
Route::get('/acara18/poin3', function () {
    $user = User::first();
    if ($user) {
        $user->name = 'John Doe Updated';
        $user->save();
        return "Poin 3 Berhasil: User ID " . $user->id . " telah di-update!";
    }
    return "User tidak ditemukan.";
});

// 4) Delete Data dengan Eloquent
Route::get('/acara18/poin4', function () {
    $user = User::where('name', 'Siti Aminah')->first();
    if ($user) {
        $user->delete();
        return "Poin 4 Berhasil: User Siti Aminah berhasil dihapus!";
    }
    return "Data Siti Aminah tidak ditemukan.";
});

// 5) Relasi One-to-Many (Mengambil data user beserta order-nya)
Route::get('/acara18/poin5', function () {
    $usersWithOrders = User::with('orders')->get();
    return dd($usersWithOrders);
});
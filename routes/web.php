<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '<h1>Selamat Datang di Sistem Minimarket</h1><p>Halaman Beranda Minimarket</p>';
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/profile/{name?}', function ($name = 'Tamu') {
    $formattedName = htmlspecialchars($name);
    
    return "<h1>Halo, {$formattedName}!</h1>" .
           "<p>Selamat datang di halaman profil.</p>";
})->where('name', '[A-Za-z]+');

Route::get('/product/{id}', function ($id) {
    return "<h1>Detail Produk</h1><p>Menampilkan produk dengan ID: {$id}</p>";
})->whereNumber('id');

Route::get('/admin/dashboard', function () {
    return '<h1>Halaman Dashboard Admin</h1><p>Selamat datang di Halaman Admin Minimarket.</p>';
})->name('dashboard');

Route::get('/', function () {
    return view('home');
});

Route::prefix('member')->group(function () {
    Route::get('/profile', function () {
        return '<h1>Profil Member</h1>';
    });
});

Route::prefix('member')->group(function () {
    Route::get('/profile', function () {
        return '<h1>Profil Member</h1>';
    });

    Route::get('/settings', function () {
        return '<h1>Pengaturan Member</h1>';
    });
});

Route::prefix('member')->middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return '<h1>Profil Member</h1>';
    });

    Route::get('/settings', function () {
        return '<h1>Pengaturan Member</h1>';
    });
});
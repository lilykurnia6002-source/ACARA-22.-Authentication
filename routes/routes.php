<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '<h1>Selamat Datang di Sistem Minimarket</h1><p>Halaman Beranda Minimarket</p>';
});

Route::get('/about', function () {
    return view('about');
});


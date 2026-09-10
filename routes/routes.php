<?php

use Illuminate\Support\Facades\Route;

// 1. Basic Routing (Menampilkan pesan halo sederhana)
Route::get('/hello', function () {
    return 'Hello, World!';
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Uppercase;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'     => ['required', new Uppercase],
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:6', 'confirmed'], // min:6 memastikan minimal 6 karakter
        ], [
            // Pesan kustom dalam Bahasa Indonesia (Opsional)
            'password.min'       => 'Password harus terdiri dari minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok dengan password.',
            'password.required'  => 'Password tidak boleh kosong.',
            'email.required'     => 'Email tidak boleh kosong.',
            'email.email'        => 'Format email tidak valid.',
            'name.required'      => 'Nama tidak boleh kosong.',
        ]);

        return "Data berhasil divalidasi!";
    }
}
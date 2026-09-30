<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    // app/Http/Middleware/Admin.php

public function handle(Request $request, Closure $next)
{
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return $next($request);
        } else {
            abort(403);
        }
    } else {
        // Ubah baris ini jika belum ada route login
        abort(401, 'Silakan login terlebih dahulu.');
    }
}
}
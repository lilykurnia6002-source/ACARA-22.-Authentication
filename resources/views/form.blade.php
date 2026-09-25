<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi - BKPM</title>
    <!-- CSS Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen p-4 my-8">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg border border-slate-200">
        <h2 class="text-2xl font-bold text-slate-800 mb-2">Form Validation BKPM</h2>
        <p class="text-sm text-slate-500 mb-6">Silakan isi data di bawah ini dengan lengkap dan benar.</p>

        {{-- Alert Notifikasi Error --}}
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6 text-sm">
                <p class="font-semibold mb-1">Terjadi Kesalahan Validation:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Input --}}
        <form action="/form" method="POST" class="space-y-4">
            @csrf
            
            {{-- Input Nama --}}
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1">
                    Nama Lengkap (Harus Kapital) <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}" 
                       placeholder="Contoh: BUDI SANTOSO"
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-slate-800">
            </div>

            {{-- Input Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">
                    Alamat Email <span class="text-red-500">*</span>
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       placeholder="nama@email.com"
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-slate-800">
            </div>

            {{-- Input Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">
                    Password <span class="text-red-500">*</span>
                </label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       placeholder="••••••••"
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-slate-800">
            </div>

            {{-- Input Konfirmasi Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">
                    Konfirmasi Password <span class="text-red-500">*</span>
                </label>
                <input type="password" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       placeholder="••••••••"
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-slate-800">
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg shadow-md transition duration-200 active:scale-95 mt-2">
                Kirim Data
            </button>
        </form>
    </div>

</body>
</html>
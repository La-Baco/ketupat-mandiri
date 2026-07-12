<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Desa Ketupat') }} - Login Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-900 flex items-center justify-center min-h-screen relative overflow-hidden">
    
    <!-- Background Decoration -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-teal-500/20 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-[100px]"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
    </div>

    <div class="w-full max-w-md px-4 relative z-10">
        <div class="bg-white rounded-3xl shadow-2xl shadow-teal-900/20 border border-slate-100 p-8 md:p-10">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-teal-50 text-teal-600 mb-4 shadow-sm border border-teal-100">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold font-outfit text-slate-900">Login Admin</h2>
                <p class="text-sm text-slate-500 mt-2">Portal Administrator Desa Ketupat Mandiri</p>
            </div>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Akses</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 focus:bg-white px-4 py-3 transition-colors">
                    @error('email')
                        <p class="mt-2 text-sm text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Kata Sandi</label>
                    <input id="password" type="password" name="password" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 focus:bg-white px-4 py-3 transition-colors">
                    @error('password')
                        <p class="mt-2 text-sm text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-8">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-slate-300 text-teal-600 shadow-sm focus:ring-teal-500 w-4 h-4">
                        <span class="ml-2 text-sm text-slate-600 font-medium">Ingat saya</span>
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all transform hover:-translate-y-0.5">
                        Masuk ke Dashboard
                    </button>
                </div>
            </form>
            <div class="mt-8 text-center pt-6 border-t border-slate-100">
                <a href="{{ route('home') }}" class="text-sm font-semibold text-slate-400 hover:text-teal-600 transition-colors flex items-center justify-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Beranda Desa
                </a>
            </div>
        </div>
    </div>
</body>
</html>

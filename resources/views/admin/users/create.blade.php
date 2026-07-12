@extends('layouts.admin')

@section('title', 'Tambah Akun')

@section('content')
<div class="p-6">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.users.index') }}" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold font-outfit text-slate-800">Tambah Akun Admin</h1>
            <p class="text-slate-500 mt-1">Buat akun admin baru untuk mengelola sistem.</p>
        </div>
    </div>

    <div class="max-w-2xl bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap <span class="text-rose-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border @error('name') border-rose-300 ring-rose-100 @else border-slate-300 focus:border-teal-500 focus:ring-teal-100 @enderror rounded-lg focus:outline-none focus:ring-4 transition-all" required autofocus>
                @error('name')
                    <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Alamat Email <span class="text-rose-500">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border @error('email') border-rose-300 ring-rose-100 @else border-slate-300 focus:border-teal-500 focus:ring-teal-100 @enderror rounded-lg focus:outline-none focus:ring-4 transition-all" required>
                @error('email')
                    <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Kata Sandi <span class="text-rose-500">*</span></label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border @error('password') border-rose-300 ring-rose-100 @else border-slate-300 focus:border-teal-500 focus:ring-teal-100 @enderror rounded-lg focus:outline-none focus:ring-4 transition-all" required>
                @error('password')
                    <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Kata Sandi <span class="text-rose-500">*</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border border-slate-300 focus:border-teal-500 focus:ring-teal-100 rounded-lg focus:outline-none focus:ring-4 transition-all" required>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800 hover:bg-slate-100 rounded-lg transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 rounded-lg shadow-sm transition-colors">Simpan Akun</button>
            </div>
        </form>
    </div>
</div>
@endsection

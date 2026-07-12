@extends('layouts.admin')

@section('content')
<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div class="mb-4 sm:mb-0">
        <h1 class="text-2xl md:text-3xl text-gray-800 font-bold">Dashboard</h1>
        <p class="text-gray-500">Selamat datang di Panel Admin Desa Ketupat</p>
    </div>
</div>


<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stat Cards Placeholder -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-50 text-blue-500 mr-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3m0 0l3-3m-3 3V8" /></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Berita</p>
                <p class="text-2xl font-bold text-gray-800">0</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-50 text-green-500 mr-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Potensi</p>
                <p class="text-2xl font-bold text-gray-800">0</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-50 text-purple-500 mr-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Agenda</p>
                <p class="text-2xl font-bold text-gray-800">0</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-50 text-yellow-500 mr-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Pengunjung Bulan Ini</p>
                <p class="text-2xl font-bold text-gray-800">0</p>
            </div>
        </div>
    </div>
</div>
@endsection

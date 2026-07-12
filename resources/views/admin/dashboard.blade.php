@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-sm p-6 border border-slate-200">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            </div>
            <div class="ml-4">
                <h2 class="text-sm font-medium text-slate-500">Total Berita</h2>
                <p class="text-3xl font-semibold text-slate-800">{{ $stats['news_count'] ?? 0 }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-sm p-6 border border-slate-200">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="ml-4">
                <h2 class="text-sm font-medium text-slate-500">Total Potensi Desa</h2>
                <p class="text-3xl font-semibold text-slate-800">{{ $stats['potentials_count'] ?? 0 }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-sm p-6 border border-slate-200">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div class="ml-4">
                <h2 class="text-sm font-medium text-slate-500">Album Galeri</h2>
                <p class="text-3xl font-semibold text-slate-800">{{ $stats['galleries_count'] ?? 0 }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6 border border-slate-200">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-orange-100 text-orange-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div class="ml-4">
                <h2 class="text-sm font-medium text-slate-500">Total Agenda</h2>
                <p class="text-3xl font-semibold text-slate-800">{{ $stats['agendas_count'] ?? 0 }}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-sm p-6 border border-slate-200">
    <h2 class="text-lg font-medium text-slate-900 mb-4">Selamat Datang di Panel Admin!</h2>
    <p class="text-slate-600 mb-4">
        Ini adalah pusat kendali untuk Website Desa Ketupat Mandiri. Anda dapat mengelola seluruh konten website dari menu yang tersedia di sebelah kiri.
    </p>
    <ul class="list-disc list-inside text-slate-600 space-y-2">
        <li><strong>Profil Desa:</strong> Kelola informasi umum, sejarah, visi misi, dan letak geografis desa.</li>
        <li><strong>Konten:</strong> Publikasikan berita terbaru, agenda kegiatan, dan potensi desa untuk meningkatkan transparansi informasi.</li>
        <li><strong>Media:</strong> Unggah foto-foto kegiatan ke dalam galeri desa.</li>
        <li><strong>Pengaturan:</strong> Sesuaikan kontak, sosial media, dan elemen tampilan website.</li>
    </ul>
</div>

<div class="mt-8 bg-white rounded-lg shadow-sm p-6 border border-slate-200">
    <h2 class="text-lg font-medium text-slate-900 mb-4">Statistik Pengunjung (7 Hari Terakhir)</h2>
    <div class="w-full h-80">
        <canvas id="visitorChart"></canvas>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('visitorChart').getContext('2d');
        const chartData = @json($chartData);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: [
                    {
                        label: 'Pengunjung Unik',
                        data: chartData.visitors,
                        borderColor: '#22c55e', // green-500
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Halaman Dilihat',
                        data: chartData.pageViews,
                        borderColor: '#3b82f6', // blue-500
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        tension: 0.3,
                        borderDash: [5, 5]
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>
@endpush

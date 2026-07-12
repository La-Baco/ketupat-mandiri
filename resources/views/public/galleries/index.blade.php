@extends('layouts.app')

@section('title', 'Galeri Desa')

@section('content')
<!-- Parallax Header for Gallery -->
<div class="relative py-24 mb-16 overflow-hidden flex items-center justify-center group">
    <!-- Gambar Latar -->
    <img src="{{ asset('images/desa.jpg') }}" alt="Galeri Desa" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear group-hover:scale-105">
    
    <!-- Gradasi warna hijau tua yang dioptimalkan -->
    <div class="absolute inset-0 bg-emerald-950/40 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-emerald-950/60 to-black/80"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/30 border border-emerald-400/50 text-emerald-100 text-sm font-semibold tracking-wider uppercase mb-4 shadow-lg backdrop-blur-md" data-aos="zoom-in" data-aos-delay="200">Dokumentasi</span>
        <h1 class="text-4xl md:text-6xl font-bold font-outfit text-white mb-6 drop-shadow-2xl" data-aos="fade-up" data-aos-delay="400">Galeri Desa</h1>
        <p class="text-xl md:text-2xl text-emerald-50/90 max-w-2xl mx-auto font-light drop-shadow-md" data-aos="fade-up" data-aos-delay="600">Momen, keindahan, dan ragam aktivitas masyarakat Desa Ketupat Mandiri.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($galleries as $gallery)
        <a href="{{ route('galleries.show', $gallery->slug) }}" class="group block" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100 flex flex-col h-full transform hover:-translate-y-2">
                <div class="relative h-64 overflow-hidden bg-slate-100">
                    @if($gallery->images->count() > 0 && $gallery->images->first()->image_path)
                        <img src="{{ Storage::url($gallery->images->first()->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="absolute bottom-0 left-0 p-6 w-full text-white">
                        <div class="flex items-center mb-2 space-x-3 text-xs font-medium text-indigo-200">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $gallery->images->count() }} Foto
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $gallery->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold font-outfit line-clamp-2">{{ $gallery->title }}</h3>
                    </div>
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 py-16 text-center bg-slate-50 rounded-2xl border border-slate-100">
            <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <h3 class="text-lg font-medium text-slate-900">Belum ada galeri</h3>
            <p class="text-slate-500">Foto dokumentasi desa akan segera ditambahkan.</p>
        </div>
        @endforelse
    </div>
    
    <div class="mt-12">
        {{ $galleries->links() }}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Potensi Desa')

@section('content')
<!-- Parallax Header -->
<div class="relative py-24 mb-16 overflow-hidden flex items-center justify-center group">
    <!-- Gambar Latar -->
    <img src="{{ asset('images/desa.jpg') }}" alt="Potensi Desa" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear group-hover:scale-105">
    
    <!-- Gradasi warna hijau tua yang dioptimalkan -->
    <div class="absolute inset-0 bg-emerald-950/40 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-emerald-950/60 to-black/80"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/30 border border-emerald-400/50 text-emerald-100 text-sm font-semibold tracking-wider uppercase mb-4 shadow-lg backdrop-blur-md" data-aos="zoom-in" data-aos-delay="200">Kekayaan Desa</span>
        <h1 class="text-4xl md:text-6xl font-bold font-outfit text-white mb-6 drop-shadow-2xl" data-aos="fade-up" data-aos-delay="400">Potensi Unggulan</h1>
        <p class="text-xl md:text-2xl text-emerald-50/90 max-w-2xl mx-auto font-light drop-shadow-md" data-aos="fade-up" data-aos-delay="600">Eksplorasi keindahan alam, pariwisata, dan produk lokal andalan masyarakat Desa Ketupat Mandiri.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        @forelse($potentials as $item)
        <article class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100 group flex flex-col md:flex-row h-full hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <a href="{{ route('potentials.show', $item->slug) }}" class="block relative w-full md:w-2/5 h-60 md:h-auto overflow-hidden shrink-0">
                @if($item->thumbnail)
                    <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="absolute inset-0 w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                        Tanpa Gambar
                    </div>
                @endif
                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/10 transition-colors duration-300"></div>
                @if($item->category)
                    <div class="absolute top-4 left-4 bg-white/95 backdrop-blur shadow-sm text-amber-600 px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider md:hidden">
                        {{ $item->category->name }}
                    </div>
                @endif
            </a>
            <div class="p-8 flex-grow flex flex-col relative bg-white md:w-3/5">
                @if($item->category)
                    <div class="hidden md:inline-block bg-amber-50 text-amber-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 w-max border border-amber-100">
                        {{ $item->category->name }}
                    </div>
                @endif
                <h3 class="text-2xl font-bold font-outfit text-slate-900 mb-3 group-hover:text-amber-500 transition-colors leading-tight">
                    <a href="{{ route('potentials.show', $item->slug) }}" class="before:absolute before:inset-0">{{ $item->title }}</a>
                </h3>
                <p class="text-slate-600 line-clamp-3 mb-6 flex-grow leading-relaxed">
                    {{ Str::limit(strip_tags($item->content), 150) }}
                </p>
                <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between relative z-10">
                    <div class="flex items-center text-xs text-slate-500 font-medium">
                        <svg class="w-4 h-4 mr-1 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        {{ $item->views }} views
                    </div>
                    <a href="{{ route('potentials.show', $item->slug) }}" class="inline-flex items-center text-amber-600 hover:text-amber-700 font-medium">
                        Detail Potensi <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </article>
        @empty
        <div class="col-span-1 md:col-span-2 py-20 text-center bg-white rounded-3xl shadow-sm border border-slate-100">
            <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <h3 class="text-xl font-medium text-slate-900 mb-2">Belum ada potensi desa</h3>
            <p class="text-slate-500">Data potensi desa akan segera ditambahkan di sini.</p>
        </div>
        @endforelse
    </div>
    
    <div class="mt-16">
        {{ $potentials->links() }}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Berita Desa')

@section('content')
<!-- Parallax Header -->
<div class="relative py-24 mb-16 overflow-hidden flex items-center justify-center group">
    <!-- Gambar Latar -->
    <img src="{{ asset('images/desa.jpg') }}" alt="Berita Desa" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear group-hover:scale-105">
    
    <!-- Gradasi warna hijau tua yang dioptimalkan -->
    <div class="absolute inset-0 bg-emerald-950/40 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-emerald-950/60 to-black/80"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/30 border border-emerald-400/50 text-emerald-100 text-sm font-semibold tracking-wider uppercase mb-4 shadow-lg backdrop-blur-md" data-aos="zoom-in" data-aos-delay="200">Informasi Publik</span>
        <h1 class="text-4xl md:text-6xl font-bold font-outfit text-white mb-6 drop-shadow-2xl" data-aos="fade-up" data-aos-delay="400">Berita Terkini</h1>
        <p class="text-xl md:text-2xl text-emerald-50/90 max-w-2xl mx-auto font-light drop-shadow-md" data-aos="fade-up" data-aos-delay="600">Kabar terbaru, pengumuman, dan artikel informatif dari Pemerintah Desa Ketupat Mandiri.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($news as $item)
        <article class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100 group flex flex-col h-full hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <a href="{{ route('news.show', $item->slug) }}" class="block relative h-60 overflow-hidden">
                @if($item->thumbnail)
                    <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                        Tanpa Gambar
                    </div>
                @endif
                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/10 transition-colors duration-300"></div>
                @if($item->category)
                    <div class="absolute top-4 left-4 bg-white/95 backdrop-blur shadow-sm text-teal-700 px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                        {{ $item->category->name }}
                    </div>
                @endif
            </a>
            <div class="p-8 flex-grow flex flex-col relative bg-white">
                <div class="flex items-center text-xs text-slate-500 mb-4 font-medium">
                    <svg class="w-4 h-4 mr-1.5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $item->published_at ? $item->published_at->format('d F Y') : $item->created_at->format('d F Y') }}
                    <span class="mx-2 text-slate-300">•</span>
                    <svg class="w-4 h-4 mr-1.5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    {{ $item->views }} dilihat
                </div>
                <h3 class="text-2xl font-bold font-outfit text-slate-900 mb-3 group-hover:text-teal-600 transition-colors leading-tight">
                    <a href="{{ route('news.show', $item->slug) }}" class="before:absolute before:inset-0">{{ $item->title }}</a>
                </h3>
                <p class="text-slate-600 line-clamp-3 mb-6 flex-grow leading-relaxed">
                    {{ Str::limit(strip_tags($item->content), 120) }}
                </p>
                <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between relative z-10">
                    <span class="text-sm font-semibold text-slate-900 flex items-center">
                        <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center mr-2">
                            {{ substr($item->author->name, 0, 1) }}
                        </div>
                        {{ $item->author->name }}
                    </span>
                    <a href="{{ route('news.show', $item->slug) }}" class="inline-flex items-center text-teal-600 hover:text-teal-700 font-medium">
                        Baca <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </article>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 py-20 text-center bg-white rounded-3xl shadow-sm border border-slate-100">
            <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            <h3 class="text-xl font-medium text-slate-900 mb-2">Belum ada berita</h3>
            <p class="text-slate-500">Berita dan artikel terbaru akan segera ditambahkan di sini.</p>
        </div>
        @endforelse
    </div>
    
    <div class="mt-16">
        {{ $news->links() }}
    </div>
</div>
@endsection

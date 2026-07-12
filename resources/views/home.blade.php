@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <!-- Hero Section -->
    <section class="relative w-full h-[85vh] min-h-[600px] overflow-hidden flex items-center justify-center group">
        <!-- Gambar Latar -->
        <img src="{{ asset('images/desa.jpg') }}" alt="Desa Ketupat Mandiri" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear group-hover:scale-105">
        
        <!-- Gradasi warna hijau tua yang dioptimalkan -->
        <div class="absolute inset-0 bg-emerald-950/40 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-emerald-950/60 to-black/80"></div>

        <!-- Konten Teks -->
        <div class="text-center px-4 relative z-10 max-w-4xl mx-auto" data-aos="fade-up">
            <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/30 border border-emerald-400/50 text-emerald-100 text-sm font-semibold tracking-wider uppercase mb-6 shadow-[0_0_20px_rgba(16,185,129,0.4)] backdrop-blur-md" data-aos="zoom-in" data-aos-delay="200">
                Selamat Datang di
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-outfit font-bold text-white mb-6 drop-shadow-2xl text-balance leading-tight" data-aos="fade-up" data-aos-delay="400">
                Desa Ketupat Mandiri
            </h1>
            <p class="text-xl md:text-2xl text-emerald-50/90 font-light drop-shadow-md" data-aos="fade-up" data-aos-delay="600">Desa Inovatif, Transparan, dan Sejahtera</p>
        </div>
    </section>

    <!-- Quick Info / Features (Floating Bento style) -->
    <section class="relative -mt-16 sm:-mt-24 z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Feature 1 -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-xl shadow-slate-200/50 border border-white/60 hover:-translate-y-2 hover:shadow-2xl hover:shadow-teal-500/10 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-teal-500/30 group-hover:scale-110 group-hover:rotate-3 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-2xl font-bold font-outfit text-slate-800 mb-3">Pemerintahan</h3>
                <p class="text-slate-600 leading-relaxed text-balance">Layanan administrasi dan informasi struktur pemerintahan desa yang transparan.</p>
            </div>
            <!-- Feature 2 -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-xl shadow-slate-200/50 border border-white/60 hover:-translate-y-2 hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-amber-500/30 group-hover:scale-110 group-hover:-rotate-3 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold font-outfit text-slate-800 mb-3">Potensi Unggulan</h3>
                <p class="text-slate-600 leading-relaxed text-balance">Eksplorasi kekayaan alam, pariwisata, dan UMKM andalan desa kami.</p>
            </div>
            <!-- Feature 3 -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-xl shadow-slate-200/50 border border-white/60 hover:-translate-y-2 hover:shadow-2xl hover:shadow-indigo-500/10 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-14 h-14 bg-gradient-to-br from-indigo-400 to-blue-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-indigo-500/30 group-hover:scale-110 group-hover:rotate-3 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold font-outfit text-slate-800 mb-3">Informasi Terkini</h3>
                <p class="text-slate-600 leading-relaxed text-balance">Berita, pengumuman, dan agenda kegiatan desa yang selalu diperbarui.</p>
            </div>
        </div>
    </section>

    <!-- Potensi Bento Grid Section -->
    @if($potentials->count() > 0)
    <section class="py-24 bg-slate-50 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-teal-400/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-amber-400/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-teal-600 font-semibold tracking-wider uppercase text-sm mb-3 block">Kekayaan Desa</span>
                <h2 class="text-3xl md:text-5xl font-bold font-outfit text-slate-900 mb-6 tracking-tight">Eksplorasi Potensi</h2>
                <p class="text-slate-600 text-lg">Temukan keindahan alam dan karya masyarakat yang menjadi kebanggaan Desa Ketupat Mandiri.</p>
            </div>

            <!-- Bento Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-4 h-auto md:h-[600px]">
                @foreach($potentials as $index => $potential)
                @php
                    // Dynamic classes for Bento Layout (Max 4 items to fit perfectly, others hide or paginate in actual view)
                    $gridClass = 'md:col-span-1 md:row-span-1';
                    if($index === 0) $gridClass = 'md:col-span-2 md:row-span-2';
                    else if($index === 1) $gridClass = 'md:col-span-2 md:row-span-1';
                    
                    if($index >= 4) break; // Only show 4 in this layout
                @endphp
                <a href="{{ route('potentials.show', $potential->slug) }}" class="{{ $gridClass }} group relative rounded-3xl overflow-hidden block" data-aos="zoom-in" data-aos-delay="{{ $index * 100 + 100 }}">
                    <div class="absolute inset-0 bg-slate-900">
                        @if($potential->thumbnail)
                            <img src="{{ Storage::url($potential->thumbnail) }}" alt="{{ $potential->title }}" class="w-full h-full object-cover opacity-80 group-hover:scale-110 group-hover:opacity-100 transition-all duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-200 to-slate-300"></div>
                        @endif
                    </div>
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">
                        @if($potential->category)
                            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-white text-xs font-semibold tracking-wider uppercase mb-3 w-max">
                                {{ $potential->category->name }}
                            </span>
                        @endif
                        <h3 class="{{ $index === 0 ? 'text-3xl lg:text-4xl' : 'text-xl lg:text-2xl' }} font-bold font-outfit text-white mb-2 transform group-hover:-translate-y-1 transition-transform">
                            {{ $potential->title }}
                        </h3>
                        @if($index === 0 || $index === 1)
                            <p class="text-slate-300 text-sm md:text-base line-clamp-2 mb-0 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                {{ Str::limit(strip_tags($potential->content), 100) }}
                            </p>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
            
            <div class="mt-12 text-center" data-aos="fade-up">
                <a href="{{ route('potentials.index') }}" class="inline-flex items-center text-teal-600 font-semibold hover:text-teal-700 bg-teal-50 hover:bg-teal-100 px-6 py-3 rounded-full transition-colors">
                    Lihat Semua Potensi
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- News & Agenda Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                
                <!-- Berita -->
                <div class="lg:col-span-2">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 gap-4" data-aos="fade-right">
                        <div>
                            <span class="text-teal-600 font-semibold tracking-wider uppercase text-sm mb-3 block">Informasi Terkini</span>
                            <h2 class="text-3xl md:text-4xl font-bold font-outfit text-slate-900 tracking-tight">Kabar Desa</h2>
                        </div>
                        <a href="{{ route('news.index') }}" class="group inline-flex items-center text-slate-500 hover:text-teal-600 font-medium transition-colors">
                            Indeks Berita <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                    
                    <div class="grid gap-8">
                        @forelse($latestNews as $news)
                        <article class="group bg-white rounded-3xl border border-slate-100 p-4 sm:p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col sm:flex-row gap-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 + 100 }}">
                            <div class="sm:w-2/5 shrink-0">
                                <a href="{{ route('news.show', $news->slug) }}" class="block relative h-48 sm:h-full min-h-[200px] rounded-2xl overflow-hidden">
                                    @if($news->thumbnail)
                                        <img src="{{ Storage::url($news->thumbnail) }}" alt="{{ $news->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="absolute inset-0 w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">Tanpa Gambar</div>
                                    @endif
                                    <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/10 transition-colors"></div>
                                </a>
                            </div>
                            <div class="sm:w-3/5 flex flex-col justify-center py-2">
                                <div class="flex flex-wrap items-center text-sm mb-4 gap-y-2">
                                    @if($news->category)
                                    <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full font-medium text-xs mr-3 border border-teal-100">
                                        {{ $news->category->name }}
                                    </span>
                                    @endif
                                    <span class="flex items-center text-slate-500">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                                    </span>
                                </div>
                                <h3 class="text-2xl font-bold font-outfit text-slate-900 mb-3 group-hover:text-teal-600 transition-colors leading-tight">
                                    <a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
                                </h3>
                                <p class="text-slate-600 line-clamp-2 mb-4 leading-relaxed">
                                    {{ Str::limit(strip_tags($news->content), 120) }}
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ route('news.show', $news->slug) }}" class="inline-flex items-center font-semibold text-teal-600 hover:text-teal-700">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4 ml-1 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                        @empty
                        <div class="text-slate-500 p-8 text-center bg-slate-50 rounded-3xl border border-slate-100">
                            Belum ada berita yang diterbitkan.
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Agenda -->
                <div class="lg:col-span-1" data-aos="fade-left" data-aos-delay="200">
                    <div class="mb-10">
                        <span class="text-amber-500 font-semibold tracking-wider uppercase text-sm mb-3 block">Jadwal Kegiatan</span>
                        <h2 class="text-3xl md:text-4xl font-bold font-outfit text-slate-900 tracking-tight">Agenda</h2>
                    </div>

                    <div class="bg-gradient-to-b from-slate-900 to-slate-800 rounded-3xl p-1 shadow-2xl relative overflow-hidden h-max">
                        <!-- Decorative glow -->
                        <div class="absolute top-0 right-0 w-40 h-40 bg-amber-500/20 blur-3xl rounded-full pointer-events-none"></div>
                        
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-[22px] p-6 sm:p-8 h-full relative z-10">
                            <div class="space-y-6">
                                @forelse($agendas as $agenda)
                                <a href="{{ route('agendas.show', $agenda->slug) }}" class="flex gap-5 group items-start p-3 -mx-3 rounded-2xl hover:bg-white/5 transition-colors">
                                    <div class="shrink-0 flex flex-col items-center justify-center w-16 h-16 bg-slate-800 border border-slate-700 rounded-xl shadow-inner text-center group-hover:border-amber-500/50 group-hover:bg-amber-500/10 transition-colors">
                                        <span class="text-[10px] font-bold text-amber-500 uppercase tracking-widest mb-0.5">{{ \Carbon\Carbon::parse($agenda->event_date)->format('M') }}</span>
                                        <span class="text-2xl font-bold text-white leading-none">{{ \Carbon\Carbon::parse($agenda->event_date)->format('d') }}</span>
                                    </div>
                                    <div class="pt-1">
                                        <h4 class="font-bold font-outfit text-white group-hover:text-amber-400 transition-colors line-clamp-2 mb-1.5 leading-snug">
                                            {{ $agenda->title }}
                                        </h4>
                                        <div class="flex items-center text-xs text-slate-400 group-hover:text-slate-300">
                                            <svg class="w-3.5 h-3.5 mr-1.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            <span class="truncate">{{ $agenda->location }}</span>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                <div class="text-slate-400 text-center py-10">
                                    Tidak ada agenda terdekat.
                                </div>
                                @endforelse
                            </div>
                            
                            <div class="mt-8 pt-6 border-t border-slate-700/50 text-center">
                                <a href="{{ route('agendas.index') }}" class="text-amber-400 font-medium hover:text-amber-300 inline-flex items-center text-sm bg-amber-400/10 hover:bg-amber-400/20 px-6 py-2.5 rounded-full transition-colors">
                                    Semua Agenda <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Galleries Section -->
    @if($galleries->count() > 0)
    <section class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12 gap-4" data-aos="fade-up">
                <div>
                    <span class="text-teal-400 font-semibold tracking-wider uppercase text-sm mb-3 block">Dokumentasi</span>
                    <h2 class="text-3xl md:text-4xl font-bold font-outfit text-white tracking-tight">Galeri Desa</h2>
                </div>
                <a href="{{ route('galleries.index') }}" class="group inline-flex items-center text-slate-400 hover:text-teal-400 font-medium transition-colors bg-white/5 hover:bg-white/10 px-6 py-2.5 rounded-full">
                    Semua Foto <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($galleries as $index => $gallery)
                <a href="{{ route('galleries.show', $gallery->slug) }}" class="group relative rounded-2xl overflow-hidden block aspect-square {{ $index === 0 ? 'md:col-span-2 md:row-span-2' : '' }}" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                    @if($gallery->images->count() > 0 && $gallery->images->first()->image_path)
                        <img src="{{ Storage::url($gallery->images->first()->image_path) }}" alt="{{ $gallery->title }}" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:scale-110 group-hover:opacity-100 transition-all duration-700">
                    @else
                        <div class="absolute inset-0 w-full h-full bg-slate-800 flex items-center justify-center">
                            <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute inset-x-0 bottom-0 p-4 sm:p-6 transform translate-y-2 group-hover:translate-y-0 transition-transform">
                        <h3 class="font-bold font-outfit text-white mb-1 line-clamp-1 {{ $index === 0 ? 'text-2xl' : 'text-lg' }}">{{ $gallery->title }}</h3>
                        <div class="flex items-center text-xs text-slate-300 opacity-0 group-hover:opacity-100 transition-opacity delay-100">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $gallery->images->count() }} Foto
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection

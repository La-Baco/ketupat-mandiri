@extends('layouts.app')

@section('title', 'Profil Desa & Aparatur')

@section('content')
<!-- Parallax Header -->
<div class="relative py-24 mb-16 overflow-hidden flex items-center justify-center group">
    <!-- Gambar Latar -->
    <img src="{{ asset('images/desa.jpg') }}" alt="Profil Desa" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear group-hover:scale-105">
    
    <!-- Gradasi warna hijau tua yang dioptimalkan -->
    <div class="absolute inset-0 bg-emerald-950/40 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-emerald-950/60 to-black/80"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/30 border border-emerald-400/50 text-emerald-100 text-sm font-semibold tracking-wider uppercase mb-4 shadow-lg backdrop-blur-md" data-aos="zoom-in" data-aos-delay="200">Tentang Kami</span>
        <h1 class="text-4xl md:text-6xl font-bold font-outfit text-white mb-6 drop-shadow-2xl" data-aos="fade-up" data-aos-delay="400">Profil Desa</h1>
        <p class="text-xl md:text-2xl text-emerald-50/90 max-w-2xl mx-auto font-light drop-shadow-md" data-aos="fade-up" data-aos-delay="600">Mengenal lebih dekat sejarah, visi misi, dan susunan pemerintahan Desa Ketupat Mandiri.</p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
    <!-- Profil Desa Content -->
    @if($profile)
    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 p-8 md:p-14 border border-slate-100 mb-20 relative overflow-hidden" data-aos="fade-up">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-teal-50 rounded-bl-[100px] -z-10"></div>
        
        <h2 class="text-3xl md:text-4xl font-bold font-outfit text-slate-900 mb-8 border-b border-slate-100 pb-4">
            Sejarah & Profil
        </h2>
        
        <div class="prose prose-slate prose-lg max-w-none prose-headings:font-outfit prose-headings:font-bold prose-a:text-teal-600">
            {!! $profile->history !!}
        </div>

        <div class="grid md:grid-cols-2 gap-10 mt-16">
            <div class="bg-teal-50 rounded-3xl p-8 border border-teal-100" data-aos="fade-right">
                <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold font-outfit text-slate-900 mb-4">Visi</h3>
                <div class="prose prose-slate text-slate-700">
                    {!! $profile->vision !!}
                </div>
            </div>
            
            <div class="bg-emerald-50 rounded-3xl p-8 border border-emerald-100" data-aos="fade-left">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-2xl font-bold font-outfit text-slate-900 mb-4">Misi</h3>
                <div class="prose prose-slate text-slate-700">
                    {!! $profile->mission !!}
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-20 bg-slate-50 rounded-3xl mb-20 border border-slate-100">
        <p class="text-slate-500">Profil desa belum ditambahkan.</p>
    </div>
    @endif

    <!-- Aparatur Desa Section -->
    <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
        <span class="text-teal-600 font-semibold tracking-wider uppercase text-sm mb-3 block">Struktur Pemerintahan</span>
        <h2 class="text-3xl md:text-5xl font-bold font-outfit text-slate-900 mb-6 tracking-tight">Aparatur Desa</h2>
        <div class="w-24 h-1 bg-gradient-to-r from-teal-400 to-emerald-500 mx-auto rounded-full"></div>
    </div>

    @if($officials->count() > 0)
        @php $head = $officials->first(); @endphp
        
        <!-- Pimpinan / Urutan 1 -->
        <div class="flex justify-center mb-12">
            <div class="w-full max-w-sm bg-white rounded-[2.5rem] overflow-hidden shadow-2xl shadow-teal-500/20 hover:shadow-teal-500/40 transition-all duration-500 border-2 border-teal-50 group relative" data-aos="fade-up">
                <div class="absolute inset-0 bg-gradient-to-br from-teal-400/20 to-emerald-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>
                <div class="relative z-10 aspect-[3/4] overflow-hidden bg-slate-100">
                    @if($head->photo)
                        <img src="{{ Storage::url($head->photo) }}" alt="{{ $head->name }}" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-slate-300">
                            <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/30 to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="absolute top-6 right-6 bg-teal-500/90 backdrop-blur-sm text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest shadow-lg">
                        Pimpinan
                    </div>

                    <div class="absolute bottom-0 left-0 w-full p-8 text-center transform translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                        <h3 class="text-3xl font-bold font-outfit mb-2 bg-gradient-to-r from-teal-300 to-emerald-100 bg-clip-text text-transparent drop-shadow-md">{{ $head->name }}</h3>
                        <p class="font-bold text-lg tracking-wide bg-gradient-to-r from-amber-300 to-orange-400 bg-clip-text text-transparent drop-shadow-sm">{{ $head->position }}</p>
                    </div>
                </div>
                @if($head->period_start || $head->period_end)
                <div class="relative z-10 px-6 py-5 bg-teal-50/80 backdrop-blur-md border-t border-teal-100 text-sm flex justify-center items-center">
                    <span class="text-slate-500">Masa Bakti: <span class="font-bold text-teal-700 ml-1">{{ $head->period_start ? \Carbon\Carbon::parse($head->period_start)->format('Y') : '?' }} - {{ $head->period_end ? \Carbon\Carbon::parse($head->period_end)->format('Y') : 'Sekarang' }}</span></span>
                </div>
                @endif
            </div>
        </div>

        <!-- Aparatur Lainnya -->
        @if($officials->count() > 1)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($officials->skip(1) as $index => $official)
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="relative aspect-[3/4] overflow-hidden bg-slate-100">
                    @if($official->photo)
                        <img src="{{ Storage::url($official->photo) }}" alt="{{ $official->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-slate-300">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/10 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="absolute bottom-0 left-0 w-full p-6 transform translate-y-2 group-hover:translate-y-0 transition-transform">
                        <h3 class="text-xl font-bold font-outfit mb-1 bg-gradient-to-r from-teal-300 to-emerald-100 bg-clip-text text-transparent drop-shadow-md">{{ $official->name }}</h3>
                        <p class="font-bold text-sm bg-gradient-to-r from-amber-300 to-orange-400 bg-clip-text text-transparent drop-shadow-sm">{{ $official->position }}</p>
                    </div>
                </div>
                @if($official->period_start || $official->period_end)
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 text-sm text-slate-500 flex justify-between items-center">
                    <span>Periode Jabatan</span>
                    <span class="font-semibold text-slate-700">
                        {{ $official->period_start ? \Carbon\Carbon::parse($official->period_start)->format('Y') : '?' }} - 
                        {{ $official->period_end ? \Carbon\Carbon::parse($official->period_end)->format('Y') : 'Sekarang' }}
                    </span>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    @else
        <div class="col-span-full py-16 text-center text-slate-500 bg-slate-50 rounded-2xl border border-slate-100">
            Belum ada data aparatur desa.
        </div>
    @endif
</div>
@endsection

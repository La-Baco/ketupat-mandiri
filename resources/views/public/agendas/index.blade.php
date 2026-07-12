@extends('layouts.app')

@section('title', 'Agenda Desa')

@section('content')
<!-- Header -->
<div class="relative py-24 mb-16 overflow-hidden flex items-center justify-center group">
    <!-- Gambar Latar -->
    <img src="{{ asset('images/desa.jpg') }}" alt="Agenda Desa" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear group-hover:scale-105">
    
    <!-- Gradasi warna hijau tua yang dioptimalkan -->
    <div class="absolute inset-0 bg-emerald-950/40 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-emerald-950/60 to-black/80"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/30 border border-emerald-400/50 text-emerald-100 text-sm font-semibold tracking-wider uppercase mb-4 shadow-lg backdrop-blur-md" data-aos="zoom-in" data-aos-delay="200">Jadwal Kegiatan</span>
        <h1 class="text-4xl md:text-6xl font-bold font-outfit text-white mb-6 drop-shadow-2xl" data-aos="fade-up" data-aos-delay="400">Agenda Desa</h1>
        <p class="text-xl md:text-2xl text-emerald-50/90 max-w-2xl mx-auto font-light drop-shadow-md" data-aos="fade-up" data-aos-delay="600">Ikuti berbagai kegiatan dan acara yang diselenggarakan di Desa Ketupat Mandiri.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
    <!-- Grid Agenda Modern -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($agendas as $item)
        <article class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100 group flex flex-col h-full hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <!-- decorative top bar -->
            <div class="h-2 w-full bg-gradient-to-r from-amber-400 to-orange-500"></div>
            
            <div class="p-8 flex-grow flex flex-col relative">
                <div class="flex items-start gap-5 mb-6">
                    <!-- Date Box -->
                    <div class="shrink-0 flex flex-col items-center justify-center w-20 h-20 bg-slate-50 border border-slate-100 rounded-2xl shadow-sm text-center group-hover:bg-orange-50 group-hover:border-orange-200 transition-colors">
                        <span class="text-xs font-bold text-orange-500 uppercase tracking-widest mb-1">{{ \Carbon\Carbon::parse($item->event_date)->format('M') }}</span>
                        <span class="text-3xl font-bold text-slate-800 leading-none group-hover:text-orange-600 transition-colors">{{ \Carbon\Carbon::parse($item->event_date)->format('d') }}</span>
                    </div>
                    <div>
                        @if($item->status == 'upcoming')
                            <span class="inline-block px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-[10px] font-bold uppercase tracking-wider mb-2">Akan Datang</span>
                        @else
                            <span class="inline-block px-2.5 py-1 bg-slate-100 text-slate-500 rounded-lg text-[10px] font-bold uppercase tracking-wider mb-2">Selesai</span>
                        @endif
                        <h3 class="text-xl font-bold font-outfit text-slate-900 group-hover:text-orange-600 transition-colors leading-tight line-clamp-3">
                            <a href="{{ route('agendas.show', $item->slug) }}" class="before:absolute before:inset-0">{{ $item->title }}</a>
                        </h3>
                    </div>
                </div>

                <div class="space-y-3 mt-auto relative z-10">
                    <div class="flex items-center text-sm text-slate-600 bg-slate-50 p-3 rounded-xl">
                        <svg class="w-5 h-5 mr-3 text-orange-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="font-medium">{{ \Carbon\Carbon::parse($item->event_date)->format('H:i') }} WIB</span>
                    </div>
                    <div class="flex items-center text-sm text-slate-600 bg-slate-50 p-3 rounded-xl">
                        <svg class="w-5 h-5 mr-3 text-orange-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="line-clamp-1 font-medium">{{ $item->location }}</span>
                    </div>
                </div>
                
                <div class="mt-6 pt-6 border-t border-slate-100 text-center relative z-10">
                    <span class="inline-flex items-center text-orange-600 font-semibold group-hover:text-orange-700">
                        Detail Kegiatan
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </div>
            </div>
        </article>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 py-20 text-center bg-white rounded-3xl shadow-sm border border-slate-100">
            <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <h3 class="text-xl font-medium text-slate-900 mb-2">Belum ada agenda</h3>
            <p class="text-slate-500">Jadwal kegiatan desa akan ditampilkan di sini.</p>
        </div>
        @endforelse
    </div>
    
    <div class="mt-16">
        {{ $agendas->links() }}
    </div>
</div>
@endsection

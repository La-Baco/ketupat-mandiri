@extends('layouts.app')

@section('title', $agenda->title)

@section('content')
<!-- Parallax Header for Agenda -->
<div class="relative pt-32 pb-48 lg:pt-40 lg:pb-56 overflow-hidden flex items-center justify-center bg-slate-900 group">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-[600px] bg-gradient-to-r from-orange-600/20 to-amber-500/20 rounded-full blur-[100px]"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="flex justify-center mb-6">
            <div class="flex flex-col items-center justify-center w-24 h-24 bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl shadow-2xl text-center transform group-hover:scale-110 transition-transform duration-500">
                <span class="text-sm font-bold text-orange-400 uppercase tracking-widest mb-1">{{ \Carbon\Carbon::parse($agenda->event_date)->format('M Y') }}</span>
                <span class="text-4xl font-bold text-white leading-none">{{ \Carbon\Carbon::parse($agenda->event_date)->format('d') }}</span>
            </div>
        </div>
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold font-outfit text-white mb-8 leading-tight drop-shadow-lg text-balance">{{ $agenda->title }}</h1>
        
        <div class="flex flex-wrap items-center justify-center text-sm md:text-base text-slate-200 font-medium space-x-6 gap-y-4">
            <span class="flex items-center bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm border border-white/10">
                <svg class="w-5 h-5 mr-2 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Pukul {{ \Carbon\Carbon::parse($agenda->event_date)->format('H:i') }} WIB
            </span>
            <span class="flex items-center bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm border border-white/10">
                <svg class="w-5 h-5 mr-2 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                {{ $agenda->location }}
            </span>
        </div>
    </div>
</div>

<!-- Article Content -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 sm:-mt-32 relative z-20 mb-24">
    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/50 p-8 md:p-14 border border-slate-100">
        
        <div class="mb-10 p-6 bg-orange-50 border border-orange-100 rounded-2xl flex items-center justify-between">
            <div>
                <h4 class="text-orange-800 font-bold font-outfit mb-1">Status Kegiatan</h4>
                @if($agenda->status == 'upcoming')
                    <p class="text-orange-600 font-medium">Kegiatan ini akan segera dilaksanakan.</p>
                @else
                    <p class="text-slate-500 font-medium">Kegiatan ini telah selesai.</p>
                @endif
            </div>
            @if($agenda->status == 'upcoming')
                <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center animate-pulse">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            @else
                <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
            @endif
        </div>

        <article class="prose prose-slate prose-lg md:prose-xl max-w-none prose-headings:font-outfit prose-headings:font-bold prose-a:text-orange-600 hover:prose-a:text-orange-700 leading-relaxed">
            {!! $agenda->description !!}
        </article>

        <!-- Footer Article -->
        <div class="mt-16 pt-8 border-t border-slate-100 flex justify-end">
            <a href="{{ route('agendas.index') }}" class="inline-flex items-center px-6 py-3 bg-slate-100 text-slate-700 font-semibold rounded-full hover:bg-orange-500 hover:text-white transition-colors shadow-sm hover:shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Agenda
            </a>
        </div>
    </div>
</div>
@endsection

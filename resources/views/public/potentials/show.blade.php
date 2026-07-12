@extends('layouts.app')

@section('title', $potential->title)

@section('content')
<!-- Parallax Header for Potential -->
<div class="relative pt-32 pb-48 lg:pt-40 lg:pb-56 overflow-hidden flex items-center justify-center bg-slate-900 group">
    @if($potential->thumbnail)
        <img src="{{ Storage::url($potential->thumbnail) }}" alt="{{ $potential->title }}" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-105 transition-transform duration-1000 ease-out">
    @else
        <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-amber-900 to-slate-900"></div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        @if($potential->category)
            <span class="inline-block py-1.5 px-4 rounded-full bg-amber-500/20 backdrop-blur-md border border-amber-500/30 text-amber-300 text-xs font-bold tracking-widest uppercase mb-6 shadow-lg">
                {{ $potential->category->name }}
            </span>
        @endif
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold font-outfit text-white mb-6 leading-tight drop-shadow-lg text-balance">{{ $potential->title }}</h1>
        <div class="flex flex-wrap items-center justify-center text-sm md:text-base text-slate-300 font-medium space-x-6">
            <span class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-amber-600 text-white flex items-center justify-center mr-3 shadow-md">
                    {{ substr($potential->author->name, 0, 1) }}
                </div>
                Oleh {{ $potential->author->name }}
            </span>
        </div>
    </div>
</div>

<!-- Article Content -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 sm:-mt-32 relative z-20 mb-24">
    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/50 p-8 md:p-14 border border-slate-100">
        <article class="prose prose-slate prose-lg md:prose-xl max-w-none prose-headings:font-outfit prose-headings:font-bold prose-a:text-amber-600 hover:prose-a:text-amber-700 prose-img:rounded-2xl prose-img:shadow-lg leading-relaxed">
            {!! $potential->content !!}
        </article>

        <!-- Footer Article -->
        <div class="mt-16 pt-8 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center text-slate-500 font-medium">
                <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                Dilihat {{ $potential->views }} kali
            </div>
            
            <a href="{{ route('potentials.index') }}" class="inline-flex items-center px-5 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-full hover:bg-amber-500 hover:text-white transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Potensi
            </a>
        </div>
    </div>
</div>
@endsection

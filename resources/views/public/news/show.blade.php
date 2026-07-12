@extends('layouts.app')

@section('title', $news->title)

@section('content')
<!-- Parallax Header for Article -->
<div class="relative pt-32 pb-48 lg:pt-40 lg:pb-56 overflow-hidden flex items-center justify-center bg-slate-900 group">
    @if($news->thumbnail)
        <img src="{{ Storage::url($news->thumbnail) }}" alt="{{ $news->title }}" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-105 transition-transform duration-1000 ease-out">
    @else
        <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-teal-900 to-slate-900"></div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        @if($news->category)
            <span class="inline-block py-1.5 px-4 rounded-full bg-teal-500/20 backdrop-blur-md border border-teal-500/30 text-teal-300 text-xs font-bold tracking-widest uppercase mb-6 shadow-lg">
                {{ $news->category->name }}
            </span>
        @endif
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold font-outfit text-white mb-6 leading-tight drop-shadow-lg text-balance">{{ $news->title }}</h1>
        <div class="flex flex-wrap items-center justify-center text-sm md:text-base text-slate-300 font-medium space-x-6">
            <span class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-teal-600 text-white flex items-center justify-center mr-3 shadow-md">
                    {{ substr($news->author->name, 0, 1) }}
                </div>
                Oleh {{ $news->author->name }}
            </span>
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ $news->published_at ? $news->published_at->format('d F Y') : $news->created_at->format('d F Y') }}
            </span>
        </div>
    </div>
</div>

<!-- Article Content -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 sm:-mt-32 relative z-20 mb-24">
    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/50 p-8 md:p-14 border border-slate-100">
        <article class="prose prose-slate prose-lg md:prose-xl max-w-none prose-headings:font-outfit prose-headings:font-bold prose-a:text-teal-600 hover:prose-a:text-teal-700 prose-img:rounded-2xl prose-img:shadow-lg leading-relaxed">
            {!! $news->content !!}
        </article>

        <!-- Tags/Footer Article -->
        <div class="mt-16 pt-8 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center text-slate-500 font-medium">
                <svg class="w-5 h-5 mr-2 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                Dilihat {{ $news->views }} kali
            </div>
            
            <!-- Social Share Placeholder -->
            <div class="flex items-center gap-3">
                <span class="text-sm font-semibold text-slate-400 uppercase tracking-wider mr-2">Bagikan</span>
                <button class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-teal-500 hover:text-white transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </button>
                <button class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-teal-500 hover:text-white transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', $gallery->title)

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Breadcrumb -->
    <nav class="flex text-sm text-slate-500 mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Beranda</a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <a href="{{ route('galleries.index') }}" class="hover:text-indigo-600 transition-colors">Galeri</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-slate-800 font-medium line-clamp-1">{{ $gallery->title }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Header -->
    <header class="mb-10 text-center max-w-3xl mx-auto">
        <h1 class="text-3xl md:text-5xl font-bold font-outfit text-slate-900 mb-4 leading-tight">
            {{ $gallery->title }}
        </h1>
        <p class="text-slate-600 text-lg mb-6">{{ $gallery->description }}</p>
        
        <div class="flex items-center justify-center space-x-4 text-sm text-slate-500">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-1.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ $gallery->created_at->translatedFormat('d F Y') }}
            </div>
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-1.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ $gallery->images->count() }} Foto
            </div>
        </div>
    </header>

    <!-- Masonry/Grid Images -->
    <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6" x-data="{ imgModal: false, imgModalSrc: '' }">
        @forelse($gallery->images as $image)
        <div class="break-inside-avoid">
            <div class="relative group rounded-xl overflow-hidden cursor-pointer bg-slate-100 shadow-sm hover:shadow-xl transition-shadow border border-slate-200" 
                 @click="imgModal = true; imgModalSrc = '{{ Storage::url($image->image_path) }}'">
                <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->caption ?? $gallery->title }}" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/40 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                </div>
                @if($image->caption)
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-slate-900/90 to-transparent text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <p class="text-sm line-clamp-2">{{ $image->caption }}</p>
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-full py-16 text-center text-slate-500 bg-slate-50 rounded-2xl border border-slate-100 w-full break-inside-avoid">
            Belum ada foto dalam galeri ini.
        </div>
        @endforelse

        <!-- Image Modal -->
        <template x-teleport="body">
            <div x-show="imgModal" class="fixed inset-0 z-[100] flex items-center justify-center" style="display: none;">
                <!-- Backdrop -->
                <div class="absolute inset-0 bg-slate-900/90 backdrop-blur-sm" @click="imgModal = false"
                     x-show="imgModal" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                
                <!-- Close Button -->
                <button @click="imgModal = false" class="absolute top-6 right-6 text-white hover:text-indigo-400 transition-colors z-10">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <!-- Image -->
                <div class="relative z-10 max-w-5xl max-h-[90vh] p-4" 
                     x-show="imgModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                    <img :src="imgModalSrc" class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl">
                </div>
            </div>
        </template>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Tambah Pengumuman')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-outfit">Tambah Pengumuman</h2>
        <p class="text-sm text-slate-500 mt-1">Buat informasi atau pemberitahuan baru.</p>
    </div>
    <a href="{{ route('admin.announcements.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">
    <form action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Pengumuman <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                    @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Isi Pengumuman <span class="text-red-500">*</span></label>
                    <textarea name="content" rows="12" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('content') }}</textarea>
                    @error('content') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Status</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Status Publikasi</label>
                        <select name="is_published" class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                            <option value="1" {{ old('is_published') == '1' ? 'selected' : '' }}>Publikasikan</option>
                            <option value="0" {{ old('is_published') == '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Publikasi</label>
                        <input type="datetime-local" name="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Lampiran</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Gambar / Poster (Opsional)</label>
                        <input type="file" name="thumbnail" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors">
                        @error('thumbnail') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>
                
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    Simpan Pengumuman
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

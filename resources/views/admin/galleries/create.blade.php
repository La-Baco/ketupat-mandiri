@extends('layouts.admin')

@section('title', 'Tambah Album Galeri')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-outfit">Tambah Album Galeri</h2>
        <p class="text-sm text-slate-500 mt-1">Buat album foto baru untuk kegiatan atau dokumentasi desa.</p>
    </div>
    <a href="{{ route('admin.galleries.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">
    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Album <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                    @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat (Opsional)</label>
                    <textarea name="description" rows="5" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('description') }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Foto-Foto Galeri</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Upload Banyak Foto <span class="text-red-500">*</span></label>
                        <input type="file" name="images[]" accept="image/*" multiple required class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors bg-white p-2 border border-slate-200 rounded-xl">
                        @error('images') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        @error('images.*') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        <p class="text-xs text-slate-400 mt-2">Anda dapat memilih banyak foto sekaligus. Format: JPG, PNG. Maks: 2MB per foto.</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Status</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Status Publikasi</label>
                        <select name="is_published" class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                            <option value="1" {{ old('is_published') == '1' ? 'selected' : '' }}>Publikasikan</option>
                            <option value="0" {{ old('is_published') == '0' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                        </select>
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Sampul Album</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Gambar Sampul Utama <span class="text-red-500">*</span></label>
                        <input type="file" name="cover_image" accept="image/*" required class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors">
                        @error('cover_image') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>
                
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    Simpan Album
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Edit Album Galeri')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-outfit">Edit Album Galeri</h2>
        <p class="text-sm text-slate-500 mt-1">Ubah judul, tambah foto, atau perbarui album.</p>
    </div>
    <a href="{{ route('admin.galleries.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">
    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Album <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                    @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat (Opsional)</label>
                    <textarea name="description" rows="5" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('description', $gallery->description) }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Foto-Foto Galeri</h3>
                    
                    @if($gallery->images->count() > 0)
                    <div class="mb-6">
                        <p class="text-sm font-medium text-slate-700 mb-3">Foto yang Sudah Ada ({{ $gallery->images->count() }}):</p>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            @foreach($gallery->images as $img)
                            <div class="relative group aspect-square rounded-lg overflow-hidden border border-slate-200">
                                <img src="{{ Storage::url($img->image) }}" class="w-full h-full object-cover">
                                <!-- UI Hapus Foto Spesifik (Belum diimplementasikan di controller, hanya visual) -->
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="text-white text-xs font-medium px-2 py-1 bg-red-600 rounded">Dapat dihapus via Album</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Tambah Foto Baru (Opsional)</label>
                        <input type="file" name="images[]" accept="image/*" multiple class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors bg-white p-2 border border-slate-200 rounded-xl">
                        @error('images') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        @error('images.*') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        <p class="text-xs text-slate-400 mt-2">Pilih lebih dari satu untuk menambahkan foto ke album ini.</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Status</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Status Publikasi</label>
                        <select name="is_published" class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                            <option value="1" {{ old('is_published', $gallery->is_published) == '1' ? 'selected' : '' }}>Publikasikan</option>
                            <option value="0" {{ old('is_published', $gallery->is_published) == '0' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                        </select>
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Sampul Album</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Gambar Sampul Utama</label>
                        
                        @if($gallery->cover_image)
                        <div class="mb-3 relative group">
                            <img src="{{ Storage::url($gallery->cover_image) }}" class="w-full h-32 object-cover rounded-lg border border-slate-200">
                        </div>
                        @endif
                        
                        <input type="file" name="cover_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors">
                        @error('cover_image') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        <p class="text-xs text-slate-400 mt-2">Biarkan kosong jika tidak ingin mengubah sampul.</p>
                    </div>
                </div>
                
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    Perbarui Album
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Edit Potensi Desa')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-outfit">Edit Potensi</h2>
        <p class="text-sm text-slate-500 mt-1">Perbarui data UMKM atau potensi unggulan.</p>
    </div>
    <a href="{{ route('admin.potentials.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">
    <form action="{{ route('admin.potentials.update', $potential->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Potensi / Usaha <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $potential->name) }}" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Lengkap <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="15" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('description', $potential->description) }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Status</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Status Publikasi</label>
                        <select name="is_published" class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                            <option value="1" {{ old('is_published', $potential->is_published) == '1' ? 'selected' : '' }}>Publikasikan</option>
                            <option value="0" {{ old('is_published', $potential->is_published) == '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Kategori & Gambar</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Kategori</label>
                        <select name="potential_category_id" class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('potential_category_id', $potential->potential_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('potential_category_id') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Gambar / Foto (Thumbnail)</label>
                        
                        @if($potential->thumbnail)
                        <div class="mb-3 relative group">
                            <img src="{{ Storage::url($potential->thumbnail) }}" class="w-full h-32 object-cover rounded-lg border border-slate-200">
                        </div>
                        @endif
                        
                        <input type="file" name="thumbnail" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors">
                        @error('thumbnail') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        <p class="text-xs text-slate-400 mt-2">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                    </div>
                </div>
                
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    Perbarui Data Potensi
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

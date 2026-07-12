@extends('layouts.admin')

@section('title', 'Edit Hero Banner')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-outfit">Edit Hero Banner</h2>
        <p class="text-sm text-slate-500 mt-1">Ubah gambar atau teks banner beranda.</p>
    </div>
    <a href="{{ route('admin.heroes.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">
    <form action="{{ route('admin.heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Banner (Opsional)</label>
                    <input type="text" name="title" value="{{ old('title', $hero->title) }}" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                    @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Subjudul Banner (Opsional)</label>
                    <textarea name="subtitle" rows="3" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('subtitle', $hero->subtitle) }}</textarea>
                    @error('subtitle') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Teks Tombol (Opsional)</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $hero->button_text) }}" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5" placeholder="Contoh: Selengkapnya">
                        @error('button_text') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">URL Tombol (Opsional)</label>
                        <input type="text" name="button_url" value="{{ old('button_url', $hero->button_url) }}" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5" placeholder="Contoh: https://...">
                        @error('button_url') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Status & Urutan</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Status Banner</label>
                        <select name="is_active" class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                            <option value="1" {{ old('is_active', $hero->is_active) == '1' ? 'selected' : '' }}>Aktif (Tampilkan)</option>
                            <option value="0" {{ old('is_active', $hero->is_active) == '0' ? 'selected' : '' }}>Nonaktif (Sembunyikan)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Urutan Tampil (Angka)</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $hero->sort_order) }}" min="1" required class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                        @error('sort_order') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Gambar Banner</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Upload Gambar Baru</label>
                        
                        @if($hero->background_image)
                        <div class="mb-3 relative group">
                            <img src="{{ Storage::url($hero->background_image) }}" class="w-full h-32 object-cover rounded-lg border border-slate-200">
                        </div>
                        @endif
                        
                        <input type="file" name="background_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors">
                        @error('background_image') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        <p class="text-xs text-slate-400 mt-2">Biarkan kosong jika tidak ingin mengubah banner saat ini.</p>
                    </div>
                </div>
                
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    Perbarui Banner
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

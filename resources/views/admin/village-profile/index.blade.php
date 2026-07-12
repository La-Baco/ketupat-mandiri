@extends('layouts.admin')

@section('title', 'Profil Desa')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800 font-outfit">Profil Desa</h2>
    <p class="text-sm text-slate-500 mt-1">Kelola informasi sejarah, visi misi, dan letak geografis desa.</p>
</div>

@if(session('success'))
<div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg relative flex items-center" role="alert">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    <span class="block sm:inline font-medium">{{ session('success') }}</span>
</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <form action="{{ route('admin.village-profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
        @csrf
        @method('PUT')
        
        <div class="space-y-8">
            <!-- Sejarah Desa -->
            <div>
                <h3 class="text-lg font-semibold text-slate-800 font-outfit mb-4 border-b border-slate-100 pb-2">Sejarah Desa</h3>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Konten Sejarah</label>
                <textarea name="history" rows="8" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('history', $profile->history) }}</textarea>
                @error('history') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Visi -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-800 font-outfit mb-4 border-b border-slate-100 pb-2">Visi Desa</h3>
                    <textarea name="vision" rows="6" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('vision', $profile->vision) }}</textarea>
                    @error('vision') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                
                <!-- Misi -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-800 font-outfit mb-4 border-b border-slate-100 pb-2">Misi Desa</h3>
                    <textarea name="mission" rows="6" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('mission', $profile->mission) }}</textarea>
                    @error('mission') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Geografis & Peta -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                <div>
                    <h3 class="text-lg font-semibold text-slate-800 font-outfit mb-4 border-b border-slate-100 pb-2">Geografis & Lokasi</h3>
                    <textarea name="geographic_location" rows="6" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('geographic_location', $profile->geographic_location) }}</textarea>
                    @error('geographic_location') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-slate-800 font-outfit mb-4 border-b border-slate-100 pb-2">Peta Wilayah (Gambar)</h3>
                    @if($profile->village_map)
                    <div class="mb-4">
                        <img src="{{ Storage::url($profile->village_map) }}" class="w-full h-32 object-cover rounded-lg border border-slate-200">
                    </div>
                    @endif
                    <input type="file" name="village_map" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors">
                    @error('village_map') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    <p class="text-xs text-slate-400 mt-2">Biarkan kosong jika tidak ingin mengubah gambar peta.</p>
                </div>
            </div>
            
            <div class="pt-6 border-t border-slate-100">
                <button type="submit" class="inline-flex justify-center py-3 px-8 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

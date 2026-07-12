@extends('layouts.admin')

@section('title', 'Edit Agenda Kegiatan')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-outfit">Edit Agenda</h2>
        <p class="text-sm text-slate-500 mt-1">Ubah jadwal kegiatan atau acara desa.</p>
    </div>
    <a href="{{ route('admin.agendas.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">
    <form action="{{ route('admin.agendas.update', $agenda->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Kegiatan / Acara <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $agenda->title) }}" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                    @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Kegiatan <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="10" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('description', $agenda->description) }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Waktu Mulai <span class="text-red-500">*</span></label>
                        <input type="datetime-local" name="start_date" value="{{ old('start_date', $agenda->start_date ? \Carbon\Carbon::parse($agenda->start_date)->format('Y-m-d\TH:i') : '') }}" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                        @error('start_date') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Waktu Selesai (Opsional)</label>
                        <input type="datetime-local" name="end_date" value="{{ old('end_date', $agenda->end_date ? \Carbon\Carbon::parse($agenda->end_date)->format('Y-m-d\TH:i') : '') }}" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                        @error('end_date') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Informasi Tambahan</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Lokasi / Tempat <span class="text-red-500">*</span></label>
                        <textarea name="location" rows="3" required class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">{{ old('location', $agenda->location) }}</textarea>
                        @error('location') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Status Kegiatan</label>
                        <select name="status" class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                            <option value="upcoming" {{ old('status', $agenda->status) == 'upcoming' ? 'selected' : '' }}>Akan Datang (Upcoming)</option>
                            <option value="ongoing" {{ old('status', $agenda->status) == 'ongoing' ? 'selected' : '' }}>Sedang Berlangsung (Ongoing)</option>
                            <option value="completed" {{ old('status', $agenda->status) == 'completed' ? 'selected' : '' }}>Selesai (Completed)</option>
                            <option value="cancelled" {{ old('status', $agenda->status) == 'cancelled' ? 'selected' : '' }}>Dibatalkan (Cancelled)</option>
                        </select>
                        @error('status') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Poster Kegiatan</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Gambar / Brosur (Opsional)</label>
                        
                        @if($agenda->thumbnail)
                        <div class="mb-3 relative group">
                            <img src="{{ Storage::url($agenda->thumbnail) }}" class="w-full h-32 object-cover rounded-lg border border-slate-200">
                        </div>
                        @endif
                        
                        <input type="file" name="thumbnail" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors">
                        @error('thumbnail') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        <p class="text-xs text-slate-400 mt-2">Biarkan kosong jika tidak ingin mengubah poster.</p>
                    </div>
                </div>
                
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    Perbarui Agenda
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

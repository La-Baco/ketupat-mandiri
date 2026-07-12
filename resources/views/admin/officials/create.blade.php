@extends('layouts.admin')

@section('title', 'Tambah Aparatur Desa')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-outfit">Tambah Aparatur Desa</h2>
        <p class="text-sm text-slate-500 mt-1">Masukkan data perangkat desa atau staf baru.</p>
    </div>
    <a href="{{ route('admin.officials.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">
    <form action="{{ route('admin.officials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap (beserta gelar) <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Jabatan <span class="text-red-500">*</span></label>
                        <input type="text" name="position" value="{{ old('position') }}" required class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5" placeholder="Cth: Kepala Desa">
                        @error('position') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">NIP / NIAP (Opsional)</label>
                        <input type="text" name="nip" value="{{ old('nip') }}" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5" placeholder="Nomor Induk Pegawai">
                        @error('nip') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi / Tugas Pokok (Opsional)</label>
                    <textarea name="description" rows="5" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old('description') }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Pendidikan Terakhir (Opsional)</label>
                        <input type="text" name="education" value="{{ old('education') }}" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                        @error('education') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Riwayat Pekerjaan (Opsional)</label>
                        <input type="text" name="work_experience" value="{{ old('work_experience') }}" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                        @error('work_experience') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Pengaturan Tampil</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Status Aktif</label>
                        <select name="is_active" class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif (Tampilkan)</option>
                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Nonaktif (Sembunyikan)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Urutan Tampil (Angka)</label>
                        <input type="number" name="order_number" value="{{ old('order_number', 1) }}" min="1" required class="block w-full rounded-lg border-slate-200 bg-white shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-3 py-2">
                        @error('order_number') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        <p class="text-xs text-slate-400 mt-1">Gunakan angka terkecil (1) untuk Kepala Desa, dst.</p>
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-100">
                    <h3 class="font-semibold text-slate-800 mb-4 font-outfit border-b border-slate-200 pb-2">Foto Profil</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Upload Foto (Opsional)</label>
                        <input type="file" name="photo" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors">
                        @error('photo') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        <p class="text-xs text-slate-400 mt-2">Rekomendasi rasio 1:1 (Persegi/Pas Foto) agar terlihat rapi.</p>
                    </div>
                </div>
                
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    Simpan Data Aparatur
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

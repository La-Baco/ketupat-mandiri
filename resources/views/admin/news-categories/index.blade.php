@extends('layouts.admin')

@section('title', 'Kategori Berita')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800 font-outfit">Kategori Berita</h2>
    <p class="text-sm text-slate-500 mt-1">Kelola kategori untuk pengelompokan berita dan artikel.</p>
</div>

@if(session('success'))
<div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg relative flex items-center" role="alert">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    <span class="block sm:inline font-medium">{{ session('success') }}</span>
</div>
@endif

@if(session('error'))
<div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative flex items-center" role="alert">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="block sm:inline font-medium">{{ session('error') }}</span>
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Form Tambah Kategori -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 sticky top-6">
            <h3 class="font-bold text-lg text-slate-800 mb-4 font-outfit border-b border-slate-100 pb-3">Tambah Kategori</h3>
            <form action="{{ route('admin.news-categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="block w-full rounded-lg border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                
                <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    Simpan Kategori
                </button>
            </form>
        </div>
    </div>

    <!-- Tabel Data Kategori -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-semibold tracking-wider">
                            <th class="px-6 py-4">Nama Kategori</th>
                            <th class="px-6 py-4">Slug</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($categories as $item)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-bold text-slate-800">
                                {{ $item->name }}
                            </td>
                            <td class="px-6 py-4 text-slate-500 font-medium">
                                {{ $item->slug }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button onclick="editCategory({{ $item->id }}, '{{ addslashes($item->name) }}')" class="inline-flex items-center p-2 bg-slate-100 hover:bg-teal-50 text-slate-600 hover:text-teal-600 rounded-lg transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                                <form action="{{ route('admin.news-categories.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori ini? Kategori tidak bisa dihapus jika masih ada berita yang menggunakannya.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center p-2 bg-slate-100 hover:bg-red-50 text-slate-600 hover:text-red-600 rounded-lg transition-colors" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-12 text-center text-slate-500">
                                Belum ada data kategori berita.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($categories->hasPages())
            <div class="px-6 py-4 border-t border-slate-200">
                {{ $categories->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Edit (Alpine.js required) -->
<div x-data="{ open: false, editId: null, editName: '' }" 
     @open-edit-modal.window="open = true; editId = $event.detail.id; editName = $event.detail.name;"
     x-show="open" class="fixed inset-0 z-[100] overflow-y-auto" style="display: none;"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" @click="open = false" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <form :action="'{{ url('admin/news-categories') }}/' + editId" method="POST">
                @csrf
                @method('PUT')
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-bold text-slate-900 font-outfit mb-4 border-b border-slate-100 pb-2">Edit Kategori</h3>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Kategori</label>
                        <input type="text" name="name" x-model="editName" required class="block w-full rounded-lg border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                    </div>
                </div>
                <div class="bg-slate-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse rounded-b-xl border-t border-slate-100">
                    <button type="submit" class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-teal-600 text-base font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                        Simpan Perubahan
                    </button>
                    <button type="button" @click="open = false" class="mt-3 w-full inline-flex justify-center rounded-lg border border-slate-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function editCategory(id, name) {
        window.dispatchEvent(new CustomEvent('open-edit-modal', {
            detail: { id: id, name: name }
        }));
    }
</script>
@endpush
@endsection

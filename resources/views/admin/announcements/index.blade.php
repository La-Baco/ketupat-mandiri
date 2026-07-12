@extends('layouts.admin')

@section('title', 'Manajemen Pengumuman')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-outfit">Pengumuman Desa</h2>
        <p class="text-sm text-slate-500 mt-1">Kelola pemberitahuan dan informasi penting untuk warga.</p>
    </div>
    <a href="{{ route('admin.announcements.create') }}" class="inline-flex items-center px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Pengumuman
    </a>
</div>

@if(session('success'))
<div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg relative flex items-center" role="alert">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    <span class="block sm:inline font-medium">{{ session('success') }}</span>
</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-semibold tracking-wider">
                    <th class="px-6 py-4">Judul Pengumuman</th>
                    <th class="px-6 py-4">Tanggal Publikasi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($announcements as $item)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($item->thumbnail)
                                <img src="{{ Storage::url($item->thumbnail) }}" class="w-12 h-12 rounded-lg object-cover mr-4 border border-slate-200">
                            @else
                                <div class="w-12 h-12 rounded-lg bg-teal-50 text-teal-500 flex items-center justify-center mr-4 border border-teal-100">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                                </div>
                            @endif
                            <div>
                                <p class="font-bold text-slate-800 line-clamp-1">{{ $item->title }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-500 text-sm">
                        {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d M Y, H:i') : '-' }}
                    </td>
                    <td class="px-6 py-4">
                        @if($item->is_published)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">
                                Publik
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                                Draft
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.announcements.edit', $item->id) }}" class="inline-flex items-center p-2 bg-slate-100 hover:bg-teal-50 text-slate-600 hover:text-teal-600 rounded-lg transition-colors" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </a>
                        <form action="{{ route('admin.announcements.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?');">
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
                    <td colspan="4" class="px-6 py-12 text-center text-slate-500">
                        Belum ada data pengumuman.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($announcements->hasPages())
    <div class="px-6 py-4 border-t border-slate-200">
        {{ $announcements->links() }}
    </div>
    @endif
</div>
@endsection

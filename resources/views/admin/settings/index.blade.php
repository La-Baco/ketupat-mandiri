@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800 font-outfit">Pengaturan Website</h2>
    <p class="text-sm text-slate-500 mt-1">Konfigurasi umum, kontak, dan tampilan website.</p>
</div>

@if(session('success'))
<div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg relative flex items-center" role="alert">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    <span class="block sm:inline font-medium">{{ session('success') }}</span>
</div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8" x-data="{ activeTab: 'group_{{ $groups->first()->id ?? 0 }}' }">
        
        <!-- Tabs Nav -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-2 sticky top-24">
                <nav class="space-y-1">
                    @foreach($groups as $group)
                    <button type="button" 
                        @click="activeTab = 'group_{{ $group->id }}'"
                        class="w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors flex items-center"
                        :class="activeTab === 'group_{{ $group->id }}' ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'">
                        {{ $group->name }}
                    </button>
                    @endforeach
                </nav>
            </div>
            
            <div class="mt-6">
                <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Simpan Pengaturan
                </button>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="lg:col-span-3">
            @foreach($groups as $group)
            <div x-show="activeTab === 'group_{{ $group->id }}'" style="display: none;" x-transition.opacity.duration.300ms class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="text-lg font-bold text-slate-800 font-outfit">{{ $group->name }}</h3>
                </div>
                
                <div class="p-6 md:p-8 space-y-6">
                    @foreach($group->settings as $setting)
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">{{ $setting->label }}</label>
                            
                            @if($setting->type === 'text')
                                <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                            
                            @elseif($setting->type === 'textarea')
                                <textarea name="{{ $setting->key }}" rows="4" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-3">{{ old($setting->key, $setting->value) }}</textarea>
                            
                            @elseif($setting->type === 'email')
                                <input type="email" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" class="block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500/20 px-4 py-2.5">
                            
                            @elseif($setting->type === 'boolean')
                                <label class="inline-flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" name="{{ $setting->key }}" value="1" {{ old($setting->key, $setting->value) == '1' ? 'checked' : '' }} class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-teal-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-teal-600"></div>
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-slate-700">Aktifkan</span>
                                </label>
                            
                            @elseif($setting->type === 'image')
                                @if($setting->value)
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($setting->value) }}" class="h-20 object-contain rounded border border-slate-200 bg-slate-50 p-2">
                                    </div>
                                @endif
                                <input type="file" name="{{ $setting->key }}" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-colors">
                            @endif
                            
                            @error($setting->key) <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</form>
@endsection

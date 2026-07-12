<!-- Sidebar -->
<div class="flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto bg-slate-900 border-r border-slate-800 transition-all duration-300 z-50 fixed lg:relative" 
    :class="{'translate-x-0': sidebarOpen, '-translate-x-full lg:translate-x-0': !sidebarOpen}">
    
    <div class="flex items-center justify-between lg:justify-center mb-8">
        <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold font-outfit text-white flex items-center gap-2">
            <div class="w-8 h-8 bg-gradient-to-br from-teal-500 to-emerald-600 rounded-lg flex items-center justify-center shadow-lg text-lg">K</div>
            <span class="tracking-tight">Ketupat<span class="text-teal-400">Admin</span></span>
        </a>
        <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white focus:outline-none transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <div class="flex flex-col justify-between flex-1">
        <nav class="space-y-1">
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-4">Utama</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                <span>Dashboard</span>
            </a>
            
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">Manajemen Konten</p>
            
            <!-- Berita -->
            <a href="{{ route('admin.news.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.news.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.news.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3m0 0l3-3m-3 3V8" /></svg>
                <span>Berita</span>
            </a>

            <!-- Potensi -->
            <a href="{{ route('admin.potentials.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.potentials.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.potentials.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                <span>Potensi Desa</span>
            </a>

            <!-- Agenda -->
            <a href="{{ route('admin.agendas.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.agendas.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.agendas.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>Agenda</span>
            </a>

            <!-- Galeri -->
            <a href="{{ route('admin.galleries.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.galleries.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.galleries.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>Galeri Foto</span>
            </a>

            <!-- Pengumuman -->
            <a href="{{ route('admin.announcements.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.announcements.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.announcements.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                <span>Pengumuman</span>
            </a>

            <!-- Banner / Hero -->
            <a href="{{ route('admin.heroes.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.heroes.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.heroes.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                <span>Hero Banner</span>
            </a>

            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">Data Desa</p>
            
            <!-- Profil Desa -->
            <a href="{{ route('admin.village-profile.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.village-profile.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.village-profile.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                <span>Profil Desa</span>
            </a>

            <!-- Aparatur -->
            <a href="{{ route('admin.officials.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.officials.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.officials.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span>Aparatur Desa</span>
            </a>
            
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">Sistem</p>

            <!-- Kategori -->
            <div x-data="{ open: {{ request()->routeIs('admin.news-categories.*') || request()->routeIs('admin.potential-categories.*') || request()->routeIs('admin.news-tags.*') || request()->routeIs('admin.potential-tags.*') ? 'true' : 'false' }} }">
                <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        <span>Taksonomi</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <div x-show="open" class="pl-12 pr-4 py-2 space-y-1 bg-slate-900/50 rounded-lg mt-1" x-collapse>
                    <a href="{{ route('admin.news-categories.index') }}" class="block py-2 text-sm text-slate-400 hover:text-teal-400 transition-colors {{ request()->routeIs('admin.news-categories.*') ? 'text-teal-400 font-medium' : '' }}">Kategori Berita</a>
                    <a href="{{ route('admin.potential-categories.index') }}" class="block py-2 text-sm text-slate-400 hover:text-teal-400 transition-colors {{ request()->routeIs('admin.potential-categories.*') ? 'text-teal-400 font-medium' : '' }}">Kategori Potensi</a>
                    <a href="{{ route('admin.news-tags.index') }}" class="block py-2 text-sm text-slate-400 hover:text-teal-400 transition-colors {{ request()->routeIs('admin.news-tags.*') ? 'text-teal-400 font-medium' : '' }}">Tag Berita</a>
                    <a href="{{ route('admin.potential-tags.index') }}" class="block py-2 text-sm text-slate-400 hover:text-teal-400 transition-colors {{ request()->routeIs('admin.potential-tags.*') ? 'text-teal-400 font-medium' : '' }}">Tag Potensi</a>
                </div>
            </div>
            
            <!-- Pengaturan -->
            <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.settings.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span>Pengaturan</span>
            </a>

            <!-- Akun Pengguna -->
            <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-teal-600/10 text-teal-400 font-medium' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.users.*') ? 'text-teal-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span>Akun Pengguna</span>
            </a>

        </nav>
    </div>
</div>

<!-- Overlay for mobile -->
<div class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-40 lg:hidden" 
    x-show="sidebarOpen" 
    x-transition:enter="transition-opacity ease-linear duration-300" 
    x-transition:enter-start="opacity-0" 
    x-transition:enter-end="opacity-100" 
    x-transition:leave="transition-opacity ease-linear duration-300" 
    x-transition:leave-start="opacity-100" 
    x-transition:leave-end="opacity-0"
    @click="sidebarOpen = false" 
    style="display: none;"></div>

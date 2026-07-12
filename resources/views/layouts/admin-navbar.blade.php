<header class="flex items-center justify-between px-6 py-4 bg-white border-b border-slate-200 sticky top-0 z-40">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-slate-500 focus:outline-none lg:hidden hover:text-teal-600 transition-colors">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <div class="hidden lg:block ml-4 text-slate-500 text-sm font-medium">
            Selamat datang kembali, {{ Auth::user()->name ?? 'Administrator' }}!
        </div>
    </div>
    
    <div class="flex items-center space-x-4">
        <a href="{{ route('home') }}" target="_blank" class="hidden md:flex items-center text-sm font-medium text-slate-500 hover:text-teal-600 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Lihat Website
        </a>
        
        <div class="h-6 w-px bg-slate-200 hidden md:block"></div>

        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 focus:outline-none">
                <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center font-bold font-outfit border border-teal-200">
                    {{ substr(Auth::user()->name ?? 'Admin', 0, 1) }}
                </div>
                <span class="text-sm font-bold font-outfit text-slate-700 hidden md:block">{{ Auth::user()->name ?? 'Administrator' }}</span>
                <svg class="w-4 h-4 text-slate-400 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            
            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 z-50 w-48 mt-3 overflow-hidden bg-white rounded-xl shadow-xl border border-slate-100" style="display: none;" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                <div class="px-4 py-3 border-b border-slate-100 md:hidden">
                    <p class="text-sm font-medium text-slate-900">{{ Auth::user()->name ?? 'Administrator' }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email ?? 'admin@desa.id' }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 font-medium transition-colors">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Keluar
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

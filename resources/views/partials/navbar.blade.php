<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-emerald-600 text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg group-hover:scale-105 transition-transform duration-300">
                        K
                    </div>
                    <span class="font-outfit font-bold text-xl text-slate-800 tracking-tight group-hover:text-teal-600 transition-colors">Ketupat<span class="text-teal-500">Mandiri</span></span>
                </a>
            </div>
            
            <div class="hidden sm:ml-8 sm:flex sm:space-x-8 items-center">
                @php
                    $navLinks = [
                        ['name' => 'Beranda', 'route' => 'home', 'pattern' => 'home'],
                        ['name' => 'Profil Desa', 'route' => 'profile.index', 'pattern' => 'profile.*'],
                        ['name' => 'Berita', 'route' => 'news.index', 'pattern' => 'news.*'],
                        ['name' => 'Potensi', 'route' => 'potentials.index', 'pattern' => 'potentials.*'],
                        ['name' => 'Galeri', 'route' => 'galleries.index', 'pattern' => 'galleries.*'],
                        ['name' => 'Agenda', 'route' => 'agendas.index', 'pattern' => 'agendas.*'],
                    ];
                @endphp

                @foreach($navLinks as $link)
                    <a href="{{ route($link['route']) }}" 
                       class="relative inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors h-full group
                              {{ request()->routeIs($link['pattern']) ? 'text-teal-600' : 'text-slate-600 hover:text-teal-600' }}">
                        {{ $link['name'] }}
                        
                        <!-- Animated Underline -->
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-teal-500 transform origin-left transition-transform duration-300 ease-out
                                     {{ request()->routeIs($link['pattern']) ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                    </a>
                @endforeach
            </div>
            
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" type="button" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:bg-slate-100 focus:outline-none transition-colors">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden hidden bg-white/95 backdrop-blur-lg border-b border-slate-200">
        <div class="pt-2 pb-4 space-y-1 px-4">
            @foreach($navLinks as $link)
                <a href="{{ route($link['route']) }}" 
                   class="block px-4 py-3 rounded-xl text-base font-medium transition-all duration-200
                          {{ request()->routeIs($link['pattern']) ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-teal-600' }}">
                    {{ $link['name'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>

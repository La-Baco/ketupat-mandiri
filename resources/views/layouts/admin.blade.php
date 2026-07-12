<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Desa Ketupat') }} - Dashboard Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')

        <!-- Main Content Wrapper -->
        <div class="relative flex flex-col flex-1 overflow-hidden">
            
            <!-- Navbar -->
            @include('layouts.admin-navbar')

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto overflow-x-hidden">
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                    {{ $slot ?? '' }}
                    @yield('content')
                </div>
            </main>

        </div>
    </div>
    @stack('scripts')
</body>
</html>

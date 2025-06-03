@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Jurusan')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased">
    <!-- Header -->

    <header class="bg-slate-800 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                {{-- Logo dan Nama Institusi --}}
                <div class="flex items-center space-x-4">
                    <a href="{{ route('literatures.index') }}" class="flex items-center space-x-4">
                        <img src="{{ asset('asset/logo.png') }}" alt="Logo Departemen"
                            class="w-14 h-14 rounded-full p-1 bg-white" />
                        <div>
                            <div class="font-bold text-xl tracking-wide">Perpustakaan</div>
                            <div class="text-xs text-slate-300 font-light uppercase tracking-wider">
                                Departemen Teknik Elektro & Informatika
                            </div>
                        </div>
                    </a>
                </div>
                <nav class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('literatures.index') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                              {{ request()->routeIs('literatures.index')
                                 ? 'bg-slate-900 text-white'
                                 : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                        Home
                    </a>
                    <a href="{{ route('library.index') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                              {{ request()->routeIs('library.index')
                                 ? 'bg-slate-900 text-white'
                                 : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                        Kelola Literatur
                    </a>
                </nav>
            </div>
    </header>

    <!-- Search Bar & Filter -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-8">
            <form action="{{ route('literatures.index') }}" method="GET"
                class="flex flex-col sm:flex-row items-center gap-4">
                <div class="relative w-full sm:flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                    <input name="search" type="search" class="w-full pl-12 pr-4 py-3 text-base border border-slate-300 rounded-lg shadow-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                              placeholder:text-slate-400" placeholder="Cari judul, penulis, atau kata kunci..."
                        value="{{ request('search') }}">
                </div>

                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <button type="button"
                        class="flex items-center justify-center gap-2 w-1/2 sm:w-auto px-5 py-3 bg-white border border-slate-300 rounded-lg text-slate-700 font-semibold hover:bg-slate-100 transition shadow-sm">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.572a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                        </svg>
                        <span>Filter</span>
                    </button>
                    <button type="submit"
                        class="flex items-center justify-center gap-2 w-1/2 sm:w-auto px-5 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <span>Cari</span>
                    </button>
                </div>
            </form>
        </div>

        <main>
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-800 text-slate-300 text-center py-6 mt-16 border-t-4 border-blue-600">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <p>&copy; {{ date('Y') }} &mdash; Perpustakaan Departemen Teknik Elektro dan Informatika</p>
            <p class="text-sm text-slate-400 mt-1">Universitas Negeri Malang</p>
        </div>
    </footer>
</body>

</html>
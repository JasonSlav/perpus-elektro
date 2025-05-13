@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Jurusan')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800 font-serif">
    <!-- Header -->
    <header class="bg-[#120fa3] text-white py-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="/logo.png" alt="Logo" class="w-14 h-14 rounded-full border-2 border-white bg-white mr-2" />
                <div>
                    <div class="font-bold text-lg leading-tight">PERPUSTAKAAN</div>
                    <div class="text-xs leading-tight">DEPARTEMEN TEKNIK ELEKTRO DAN INFORMATIKA</div>
                </div>
            </div>
            <nav class="flex space-x-8 text-base font-medium">
                <a href="{{ route('literatures.index') }}" class="hover:text-yellow-300">Home</a>
                <a href="{{ route('library.index') }}" class="text-white hover:text-gray-200">Kelola Literatur</a>
                <a href="#" class="text-yellow-300 border-b-2 border-yellow-300 pb-1">Data buku</a>
                <a href="#" class="hover:text-yellow-300">Penelitian <span class="ml-1">&#x25BC;</span></a>
                <a href="#" class="hover:text-yellow-300">Jurnal <span class="ml-1">&#x25BC;</span></a>
                <a href="#" class="hover:text-yellow-300">Data petugas</a>
                <a href="#" class="hover:text-yellow-300">Akun</a>
            </nav>
        </div>
    </header>

    <!-- Search Bar & Filter -->
    <div class="container mx-auto flex items-center mt-8 mb-4">
        <button class="bg-yellow-400 text-white font-semibold px-8 py-2 rounded-l-full text-lg shadow">SEARCH</button>
        <input type="text" class="flex-1 px-4 py-2 border-t border-b border-gray-300 focus:outline-none text-lg" placeholder="" style="border-left: none; border-right: none;" />
        <div class="bg-gray-200 px-6 py-2 rounded-r-full flex items-center cursor-pointer ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V6zm0 6a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2zm0 6a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z" /></svg>
            <span class="text-lg font-medium">Filter</span>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <p>&copy; {{ date('Y') }} Perpustakaan Jurusan</p>
    </footer>
</body>

</html>
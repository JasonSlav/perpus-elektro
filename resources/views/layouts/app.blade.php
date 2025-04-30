<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Departemen Teknik Elektro dan Informatika</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-primary shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo UM" class="h-16 w-16">
                    <div class="text-white">
                        <div class="font-bold text-lg">PERPUSTAKAAN</div>
                        <div class="text-sm">DEPARTEMEN TEKNIK ELEKTRO DAN INFORMATIKA</div>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-8 text-white">
                    <a href="#" class="hover:text-yellow-300 transition">Home</a>
                    <a href="#" class="hover:text-yellow-300 transition">Data buku</a>
                    <a href="#" class="hover:text-yellow-300 transition">Penelitian</a>
                    <a href="#" class="hover:text-yellow-300 transition">Jurnal</a>
                    <a href="#" class="hover:text-yellow-300 transition">Data petugas</a>
                    <a href="#" class="hover:text-yellow-300 transition">Akun</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Section -->
    <div class="container mx-auto px-4 mt-8">
        <div class="flex gap-4">
            <button class="bg-secondary text-white px-8 py-2.5 rounded-lg font-medium hover:bg-yellow-600 transition">
                SEARCH
            </button>
            <input type="text" 
                   class="flex-1 rounded-lg border border-gray-300 px-4 focus:outline-none focus:ring-2 focus:ring-primary"
                   placeholder="Cari buku...">
            <button class="bg-gray-200 px-6 py-2.5 rounded-lg flex items-center gap-2 hover:bg-gray-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
                Filter
            </button>
        </div>
    </div>

    <!-- Book Grid -->
    <div class="container mx-auto px-4 my-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @for($i = 1; $i <= 8; $i++)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <img src="https://via.placeholder.com/300x400" alt="Book Cover" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Judul buku</h3>
                    <p class="text-gray-600">Penulis</p>
                </div>
            </div>
            @endfor
        </div>
    </div>
</body>
</html>
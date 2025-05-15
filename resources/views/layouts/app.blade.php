@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Jurusan')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Header -->
    <header class="bg-blue-600 text-white p-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Perpustakaan Jurusan</h1>
            <nav class="space-x-6">
                <a href="{{ route('literatures.index') }}" class="text-white hover:text-gray-200">Home</a>
                <a href="{{ route('library.index') }}" class="text-white hover:text-gray-200">Kelola Literatur</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; {{ date('Y') }} Perpustakaan Jurusan</p>
    </footer>

</body>

</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Jurusan')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Perpustakaan Jurusan</h1>
        <nav>
            <a href="{{ route('literatures.index') }}">Home</a>
            <a href="{{ route('literatures.create') }}">Tambah Literatur</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Perpustakaan Jurusan</p>
    </footer>
</body>
</html>

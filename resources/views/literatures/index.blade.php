@extends('layouts.app')

@section('title', 'Daftar Literatur')

@section('content')
<h2>Daftar Literatur</h2>

<table border="1">
    <thead>
        <tr>
            <th>Tipe</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Detail</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($literatures as $literature)
        <tr>
            <td>{{ $literature->category->type->name ?? '-' }}</td> {{-- Relasi ke types --}}
            <td>{{ $literature->category->name ?? '-' }}</td> {{-- Relasi ke categories --}}
            <td>{{ $literature->title }}</td>
            <td>{{ $literature->author ?? '-' }}</td>
            <td>{{ $literature->publisher ?? '-' }}</td>
            <td>{{ $literature->year ?? '-' }}</td>
            <td>{{ $literature->detail ?? '-' }}</td> {{-- Dari kolom detail (JSON) --}}
            <td>
                @if ($literature->file_url)
                    <a href="{{ asset($literature->file_url) }}" target="_blank">Lihat</a>
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

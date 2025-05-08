@extends('layouts.app')

@section('title', 'Daftar Literatur')

@section('content')
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<h2 class="text-3xl font-bold text-blue-600">Daftar Literatur</h2>

<table class="min-w-full bg-white border border-gray-300 rounded-lg">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 text-left">Tipe</th>
            <th class="px-4 py-2 text-left">Kategori</th>
            <th class="px-4 py-2 text-left">Judul</th>
            <th class="px-4 py-2 text-left">Penulis</th>
            <th class="px-4 py-2 text-left">Penerbit</th>
            <th class="px-4 py-2 text-left">Tahun</th>
            <th class="px-4 py-2 text-left">Detail</th>
            <th class="px-4 py-2 text-left">File</th>
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
            <td>{{ $literature->description ?? '-' }}</td>
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
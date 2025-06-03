@extends('layouts.app')

@section('title', 'Daftar Literatur')

@section('content')
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<h2 class="text-3xl font-bold text-blue-600">Daftar Literatur</h2>

<table class="min-w-full bg-white border border-gray-300 rounded-lg">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 text-left">Cover</th>
            <th class="px-4 py-2 text-left">Judul</th>
            <th class="px-4 py-2 text-left">Penulis</th>
            <th class="px-4 py-2 text-left">penerbit</th>
            <th class="px-4 py-2 text-left">Tahun</th>
            <th class="px-4 py-2 text-left">Link</th>
            <th class="px-4 py-2 text-left">Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($literatures as $literature)
        <tr>
            <td>
                <img src="{{ $literature->cover_url ?? 'https://via.placeholder.com/50x70?text=No+Cover' }}" alt="Cover"
                    class="w-12 h-16 object-cover rounded">
            </td>
            <td>{{ $literature->category->type->cover ?? '-' }}</td>
            <td>{{ $literature->category->type->title ?? '-' }}</td>
            <td>{{ $literature->category->author ?? '-' }}</td>
            <td>{{ $literature->publisher }}</td>
            <td>{{ $literature->year ?? '-' }}</td>
            <td>{{ $literature->file_url ?? '-' }}</td>
            <td>{{ $literature->category_id ?? '-' }}</td>
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

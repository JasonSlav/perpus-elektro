@extends('layouts.app')

@section('title', 'Daftar Literatur')

@section('content')
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-full mx-auto">

    {{-- Page Title --}}
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-700 mb-8">
        Daftar Literatur
    </h2>

    {{-- Table Container with shadow and rounded corners for a modern look --}}
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="overflow-x-auto"> {{-- Ensures table is scrollable on smaller screens --}}
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr class="bg-gray-100">
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                            Cover</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Judul</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Penulis</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                            penerbit</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Tahun</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Link</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                            Kategori</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($literatures as $literature)
                    <tr class="hover:bg-gray-50 transition-colors duration-150 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap align-middle">
                            <img src="{{ $literature->cover_url ?? 'https://via.placeholder.com/50x70?text=No+Cover' }}"
                                alt="Cover" class="w-12 h-16 object-cover rounded">
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 align-middle min-w-[200px]">
                            {{ $literature->category->type->cover ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 align-middle min-w-[150px]">
                            {{ $literature->category->type->title ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 align-middle min-w-[150px]">
                            {{ $literature->category->author ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 align-middle whitespace-nowrap">
                            {{ $literature->publisher }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 align-middle whitespace-nowrap">
                            {{ $literature->year ?? '-' }}
                        </td>
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
        </div>
    </div>
</div>
@endsection
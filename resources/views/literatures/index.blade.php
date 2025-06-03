@extends('layouts.app')

@section('title', 'Daftar Literatur')

@section('content')
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-7xl mx-auto">

    {{-- Judul Halaman --}}
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-8">
        Daftar Literatur
    </h2>

    {{-- Container Tabel --}}
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3 text-left whitespace-nowrap">Cover</th>
                        <th class="px-6 py-3 text-left">Judul</th>
                        <th class="px-6 py-3 text-left">Penulis</th>
                        <th class="px-6 py-3 text-left">Penerbit</th>
                        <th class="px-6 py-3 text-left">Tahun</th>
                        <th class="px-6 py-3 text-left">Kategori</th>
                        <th class="px-6 py-3 text-left">Link</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100 text-gray-800">
                    @foreach ($literatures as $literature)
                    <tr class="hover:bg-gray-50 transition duration-100 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ $literature->cover_url ?? 'https://via.placeholder.com/50x70?text=No+Cover' }}"
                                alt="Cover" class="w-12 h-16 object-cover rounded-md border border-gray-300">
                        </td>
                        <td class="px-6 py-4 min-w-[180px]">
                            {{ $literature->title ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $literature->author ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $literature->publisher ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $literature->year ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $literature->category->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($literature->file_url)
                            <a href="{{ $literature->file_url }}" target="_blank"
                                class="text-indigo-600 hover:underline">Lihat</a>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    @if ($literatures->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 px-6 py-8">
                            Tidak ada literatur yang tersedia.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Manajemen Literatur')

@section('content')
<!-- JENIS LITERATUR -->
<div class="bg-white rounded-2xl shadow-md p-6 mb-12 border border-gray-100">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2 border-indigo-200">Jenis Literatur</h1>
    <!-- Tambah Jenis Literatur -->
    <div class="bg-white rounded-2xl shadow-md p-6 mb-12 border border-gray-100">
        <h3 class="text-xl font-semibold text-indigo-700 mb-6">Tambah Jenis Literatur</h3>
        <form action="{{ route('library.storeType') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col md:flex-row gap-4">
                <input type="text" name="name" placeholder="Nama Jenis Literatur" required
                    class="flex-1 rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition duration-200">Tambah
                    Jenis Literatur</button>
            </div>
        </form>
    </div>

    <!-- Daftar Jenis Literatur -->
    <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
        <h3 class="text-xl font-semibold text-indigo-700 mb-6">Daftar Jenis Literatur</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border-separate border-spacing-y-3">
                <thead>
                    <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-100">
                        <th class="px-4 py-3 rounded-l-lg">Nama</th>
                        <th class="px-4 py-3 rounded-r-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($types as $type)
                    <tr class="bg-white shadow-sm rounded-lg">
                        <td class="px-4 py-3 align-middle">{{ $type->name }}</td>
                        <td class="px-4 py-3">
                            <div class="flex flex-col md:flex-row gap-2">

                                <!-- Form Update -->
                                <form action="{{ route('library.updateType', $type->id) }}" method="POST"
                                    class="flex gap-2 items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" value="{{ $type->name }}" required
                                        class="rounded-md border border-gray-300 px-3 py-1 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                                    <button type="submit"
                                        class="px-4 py-1.5 bg-sky-600 text-white rounded-md hover:bg-sky-700 transition duration-150 text-sm whitespace-nowrap">
                                        Update</button>
                                </form>

                                <!-- Form Delete -->
                                <form action="{{ route('library.destroyType', $type->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full md:w-auto px-4 py-1.5 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150 text-sm whitespace-nowrap">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- KATEGORI LITERATUR -->
<div class="bg-white rounded-2xl shadow-md p-6 mb-12 border border-gray-100">

    <!-- Tambah Kategori Literatur -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2 border-indigo-200">Kategori Literatur</h1>
    <div class="bg-white rounded-2xl shadow-md p-6 mb-12 border border-gray-100">
        <h3 class="text-xl font-semibold text-indigo-700 mb-6">Tambah Kategori Literatur</h3>
        <form action="{{ route('library.storeCategory') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input type="text" name="name" placeholder="Nama Kategori Literatur" required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">

                <select name="type_id" required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                    <option value="">Pilih Jenis Literatur</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition duration-200">
                    Tambah Kategori Literatur</button>
            </div>
        </form>
    </div>

    <!-- Daftar Kategori Literatur -->
    <div class="bg-white rounded-2xl shadow-md p-6 mb-12 border border-gray-100">
        <h3 class="text-xl font-semibold text-indigo-700 mb-6">Daftar Kategori Literatur</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border-separate border-spacing-y-3">
                <thead>
                    <tr class="bg-gray-100 text-gray-500 text-xs uppercase tracking-wider font-semibold">
                        <th class="px-4 py-3 rounded-l-lg">Nama</th>
                        <th class="px-4 py-3">Jenis Literatur</th>
                        <th class="px-4 py-3 rounded-r-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($categories as $category)
                    <tr lass="bg-white shadow-sm rounded-lg">
                        <td class="px-4 py-3 align-middle">{{ $category->name }}</td>
                        <td class="px-4 py-3 align-middle">{{ $category->type->name }}</td>
                        <td class="px-4 py-3 align-middle">
                            <div class="flex flex-col md:flex-row gap-2">
                                <form action="{{ route('library.updateCategory', $category->id) }}" method="POST"
                                    class="flex gap-2 items-center flex-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" value="{{ $category->name }}" required
                                        class="flex-1 rounded-md border border-gray-300 px-3 py-1 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                                    <select name="type_id" required
                                        class="rounded-md border border-gray-300 px-3 py-1 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $type->id == $category->type_id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    <button type="submit"
                                        class="px-4 py-1.5 bg-sky-600 text-white rounded-md hover:bg-sky-700 transition duration-150 text-sm whitespace-nowrap">
                                        Update
                                    </button>
                                </form>

                                <form action="{{ route('library.destroyCategory', $category->id) }}" method="POST"
                                    class="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full md:w-auto px-4 py-1.5 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150 text-sm whitespace-nowrap">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ISI LITERATUR -->
<div class="bg-white rounded-2xl shadow-md p-6 mb-12 border border-gray-100">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2 border-indigo-200">Isi Literatur</h1>
    <div class="bg-white rounded-2xl shadow-md p-6 mb-12 border border-gray-100">

        <!-- Tambah Literatur -->
        <h3 class="text-xl font-semibold text-indigo-700 mb-6">Tambah Literatur</h3>
        <form action="{{ route('library.storeLiterature') }}" method="POST" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <input type="text" name="title" placeholder="Cover" required
                    class="rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                <input type="text" name="title" placeholder="Judul Literatur" required
                    class="rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                <input type="text" name="author" placeholder="Penulis Literatur" required
                    class="rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                <input type="text" name="publisher" placeholder="Penerbit Literatur (tidak wajib)"
                    class="rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                <input type="number" name="year" placeholder="Tahun Terbit Literatur" required
                    class="rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                <input type="url" name="file_url" placeholder="Link Literatur" required
                    class="rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                <select name="category_id" required
                    class="md:col-span-2 rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                    <option value="">Pilih Kategori Literatur</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="w-full md:w-auto px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200 font-semibold">Tambah
                Literatur</button>
        </form>
    </div>

    <!-- Daftar Literatur  -->
    <div class="bg-white rounded-2xl shadow-md p-6 mb-12 border border-gray-100">
        <h3 class="text-xl font-semibold text-indigo-700 mt-10 mb-6 border-b border-indigo-200 pb-2">Daftar
            Literatur
        </h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider rounded-tl-lg">
                            Cover</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Judul
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Penulis
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Penerbit</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Tahun
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Link
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Kategori</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider rounded-tr-lg">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                    @foreach ($literatures as $literature)
                    <tr class="hover:bg-indigo-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $literature->cover }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $literature->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $literature->author }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $literature->publisher ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $literature->year }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ $literature->file_url }}" target="_blank"
                                class="text-indigo-600 hover:text-indigo-900 underline">Lihat File</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $literature->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap space-x-2">
                            <button onclick="showEditModal({{ $literature->id }})"
                                class="px-3 py-1 bg-sky-600 text-white rounded-md hover:bg-sky-700 transition duration-150 text-sm">Edit</button>
                            <form action="{{ route('library.destroyLiterature', $literature->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150 text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol Edit -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-auto p-6 border border-gray-100">
            <h3 class="text-xl font-semibold text-indigo-700 mb-4">Edit Literatur</h3>
            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="space-y-3">
                    <input type="text" name="title" placeholder="Judul Literatur" value="{{ $literature->title }}"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm text-gray-700 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none"
                        required>
                    <input type="text" name="author" placeholder="Penulis Literatur" required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm text-gray-700 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none"
                        required>
                    <input type="text" name="publisher" placeholder="Penerbit Literatur"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm text-gray-700 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none"
                        required>
                    <input type="number" name="year" placeholder="Tahun Terbit Literatur" required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm text-gray-700 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                    <input type="url" name="file_url" placeholder="Link Literatur" required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm text-gray-700 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none"
                        required>
                    <select name="category_id" required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm text-gray-700 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none"
                        required> @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <button type="button" onclick="hideEditModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition duration-150">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-150">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showEditModal(id) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editForm');
            form.action = `/library/literature/${id}`;
            modal.classList.remove('hidden');
        }

        function hideEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
        }
    </script>
    @endsection
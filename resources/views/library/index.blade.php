@extends('layouts.app')

@section('title', 'Manajemen Literatur')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Manajemen Literatur</h2>

    <!-- Type Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Tambah Jenis Literatur</h3>
        <form action="{{ route('library.storeType') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex gap-4">
                <input type="text" name="name" placeholder="Nama Jenis Literatur" required
                    class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-150">Tambah
                    Jenis Literatur</button>
            </div>
        </form>

        <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">Daftar Jenis Literatur</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($types as $type)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $type->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap space-x-2">
                            <form action="{{ route('library.updateType', $type->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-2">
                                    <input type="text" name="name" value="{{ $type->name }}" required
                                        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <button type="submit"
                                        class="px-3 py-1 bg-sky-600 text-white rounded-md hover:bg-sky-700 transition duration-150">Update</button>
                                </div>
                            </form>
                            <form action="{{ route('library.destroyType', $type->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Category Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Tambah Kategori Literatur</h3>
        <form action="{{ route('library.storeCategory') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input type="text" name="name" placeholder="Nama Kategori Literatur" required
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <select name="type_id" required
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Pilih Jenis Literatur</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-150">Tambah
                    Kategori Literatur</button>
            </div>
        </form>

        <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">Daftar Kategori Literatur</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                            Literatur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($categories as $category)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->type->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap space-x-2">
                            <form action="{{ route('library.updateCategory', $category->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-2">
                                    <input type="text" name="name" value="{{ $category->name }}" required
                                        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <select name="type_id" required
                                        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $type->id == $category->type_id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <button type="submit"
                                        class="px-3 py-1 bg-sky-600 text-white rounded-md hover:bg-sky-700 transition duration-150">Update</button>
                                </div>
                            </form>
                            <form action="{{ route('library.destroyCategory', $category->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Literature Section -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Tambah Literatur</h3>
        <form action="{{ route('library.storeLiterature') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="title" placeholder="Cover" required
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <input type="text" name="title" placeholder="Judul Literatur" required
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <input type="text" name="author" placeholder="Penulis Literatur" required
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <input type="text" name="publisher" placeholder="Penerbit Literatur (tidak wajib)"
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <input type="number" name="year" placeholder="Tahun Terbit Literatur" required
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <input type="url" name="file_url" placeholder="Link Literatur" required
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <select name="category_id" required
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Pilih Kategori Literatur</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="w-full md:w-auto px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-150">Tambah
                Literatur</button>
        </form>

        <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">Daftar Literatur</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cover
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Penerbit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kategori</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($literatures as $literature)
                    <tr>
                        <td class="px-6 py-4">{{ $literature->cover }}</td>
                        <td class="px-6 py-4">{{ $literature->title }}</td>
                        <td class="px-6 py-4">{{ $literature->author }}</td>
                        <td class="px-6 py-4">{{ $literature->publisher ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $literature->year }}</td>
                        <td class="px-6 py-4">dss
                            <a href="{{ $literature->file_url }}" target="_blank"
                                class="text-indigo-600 hover:text-indigo-900">Lihat File</a>
                        </td>
                        <td class="px-6 py-4">{{ $literature->category->name }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <button onclick="showEditModal({{ $literature->id }})"
                                class="px-3 py-1 bg-sky-600 text-white rounded-md hover:bg-sky-700 transition duration-150">Edit</button>
                            <form action="{{ route('library.destroyLiterature', $literature->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Literatur</h3>
            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="space-y-2">
                    <input type="text" name="title" placeholder="Judul Literatur" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <input type="text" name="author" placeholder="Penulis Literatur" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <input type="text" name="publisher" placeholder="Penerbit Literatur"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <input type="number" name="year" placeholder="Tahun Terbit Literatur" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <input type="url" name="file_url" placeholder="Link Literatur" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <select name="category_id" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideEditModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-150">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-150">Simpan</button>
                </div>
            </form>
        </div>
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
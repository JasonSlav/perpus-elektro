@extends('layouts.app')

@section('title', 'Manajemen Literatur')

@section('styles')
<style>
    /* General Styles */
    .container {
        max-width: 1200px;
    }

    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th {
        text-align: left;
        padding: 12px 15px;
        background-color: #f9fafb;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 0.75rem;
        color: #6b7280;
    }

    .table td {
        padding: 12px 15px;
        border-top: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    .table tr:hover td {
        background-color: #f9fafb;
    }

    /* Button Styles */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 500;
        transition: all 0.15s ease-in-out;
    }

    .btn-indigo {
        background-color: #6366f1;
        color: white;
    }

    .btn-indigo:hover {
        background-color: #4f46e5;
    }

    .btn-sky {
        background-color: #0ea5e9;
        color: white;
    }

    .btn-sky:hover {
        background-color: #0284c7;
    }

    .btn-red {
        background-color: #ef4444;
        color: white;
    }

    .btn-red:hover {
        background-color: #dc2626;
    }

    .btn-gray {
        background-color: #e5e7eb;
        color: #374151;
    }

    .btn-gray:hover {
        background-color: #d1d5db;
    }

    /* Form Styles */
    .form-input {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-input:focus {
        border-color: #6366f1;
        outline: none;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .form-select {
        width: 100%;
        padding: 0.5rem 2.5rem 0.5rem 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
    }

    .form-select:focus {
        border-color: #6366f1;
        outline: none;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .form-textarea {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-textarea:focus {
        border-color: #6366f1;
        outline: none;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    /* Modal Styles */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 50;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    .modal.show {
        opacity: 1;
        pointer-events: auto;
    }

    .modal-content {
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        width: 100%;
        max-width: 28rem;
        max-height: 90vh;
        overflow-y: auto;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            min-width: 640px;
        }

        .grid-cols-1 {
            grid-template-columns: 1fr;
        }
    }

    /* Link Styles */
    .link {
        color: #6366f1;
        text-decoration: none;
        transition: color 0.15s ease-in-out;
    }

    .link:hover {
        color: #4f46e5;
        text-decoration: underline;
    }

    /* Card Styles */
    .card {
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    /* Utility Classes */
    .space-y-4 > * + * {
        margin-top: 1rem;
    }

    .space-x-2 > * + * {
        margin-left: 0.5rem;
    }

    .rounded-md {
        border-radius: 0.375rem;
    }

    .shadow-sm {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .transition {
        transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }
</style>
@endsection

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
                    class="form-input">
                <button type="submit"
                    class="btn btn-indigo">Tambah Jenis Literatur</button>
            </div>
        </form>

        <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">Daftar Jenis Literatur</h3>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td class="space-x-2">
                            <form action="{{ route('library.updateType', $type->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-2">
                                    <input type="text" name="name" value="{{ $type->name }}" required
                                        class="form-input">
                                    <button type="submit"
                                        class="btn btn-sky">Update</button>
                                </div>
                            </form>
                            <form action="{{ route('library.destroyType', $type->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-red">Hapus</button>
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
                    class="form-input">
                <select name="type_id" required class="form-select">
                    <option value="">Pilih Jenis Literatur</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                <button type="submit"
                    class="btn btn-indigo">Tambah Kategori Literatur</button>
            </div>
        </form>

        <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">Daftar Kategori Literatur</h3>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Literatur</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->type->name }}</td>
                        <td class="space-x-2">
                            <form action="{{ route('library.updateCategory', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-2">
                                    <input type="text" name="name" value="{{ $category->name }}" required
                                        class="form-input">
                                    <select name="type_id" required class="form-select">
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $type->id == $category->type_id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <button type="submit"
                                        class="btn btn-sky">Update</button>
                                </div>
                            </form>
                            <form action="{{ route('library.destroyCategory', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-red">Hapus</button>
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
                <input type="text" name="title" placeholder="Judul Literatur" required
                    class="form-input">
                <input type="text" name="author" placeholder="Penulis Literatur" required
                    class="form-input">
                <input type="text" name="publisher" placeholder="Penerbit Literatur (tidak wajib)"
                    class="form-input">
                <input type="number" name="year" placeholder="Tahun Terbit Literatur" required
                    class="form-input">
                <input type="url" name="file_url" placeholder="Link Literatur" required
                    class="form-input">
                <select name="category_id" required class="form-select">
                    <option value="">Pilih Kategori Literatur</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <textarea name="description" placeholder="Deskripsi Literatur (tidak wajib)"
                    class="form-textarea h-32"></textarea>
                <textarea name="detail" placeholder="Detail Literatur (tidak wajib)"
                    class="form-textarea h-32"></textarea>
            </div>
            <button type="submit"
                class="btn btn-indigo w-full md:w-auto">Tambah Literatur</button>
        </form>

        <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">Daftar Literatur</h3>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Link</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($literatures as $literature)
                    <tr>
                        <td>{{ $literature->title }}</td>
                        <td>{{ $literature->author }}</td>
                        <td>{{ $literature->publisher ?? '-' }}</td>
                        <td>{{ $literature->year }}</td>
                        <td>
                            <a href="{{ $literature->file_url }}" target="_blank"
                                class="link">Lihat File</a>
                        </td>
                        <td>{{ $literature->category->name }}</td>
                        <td class="space-x-2">
                            <button onclick="showEditModal({{ $literature->id }})"
                                class="btn btn-sky">Edit</button>
                            <form action="{{ route('library.destroyLiterature', $literature->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-red">Hapus</button>
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
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="p-5">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Literatur</h3>
            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="space-y-2">
                    <input type="text" name="title" placeholder="Judul Literatur" required
                        class="form-input">
                    <input type="text" name="author" placeholder="Penulis Literatur" required
                        class="form-input">
                    <input type="text" name="publisher" placeholder="Penerbit Literatur"
                        class="form-input">
                    <input type="number" name="year" placeholder="Tahun Terbit Literatur" required
                        class="form-input">
                    <input type="url" name="file_url" placeholder="Link Literatur" required
                        class="form-input">
                    <select name="category_id" required class="form-select">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <textarea name="description" placeholder="Deskripsi Literatur"
                        class="form-textarea h-24"></textarea>
                    <textarea name="detail" placeholder="Detail Literatur"
                        class="form-textarea h-24"></textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideEditModal()"
                        class="btn btn-gray">Batal</button>
                    <button type="submit"
                        class="btn btn-indigo">Simpan</button>
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
    modal.classList.add('show');

    // Anda bisa menambahkan AJAX di sini untuk mengambil data yang akan diedit
    // dan mengisi form modal dengan data tersebut
}

function hideEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.remove('show');
}

// Tutup modal ketika klik di luar area modal
window.addEventListener('click', (event) => {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
        hideEditModal();
    }
});
</script>
@endsection

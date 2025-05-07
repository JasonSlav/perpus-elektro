@extends('layouts.app')

@section('title', 'Manajemen Literatur')

@section('content')
<h2>Manajemen Literatur</h2>

<!-- Form untuk Type -->
<h3>Tambah Jenis Literatur</h3>
<form action="{{ route('library.storeType') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama Jenis Literatur" required>
    <button type="submit">Tambah Jenis Literatur</button>
</form>

<h3>Daftar Jenis Literatur</h3>
<table border="1">
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
            <td>
                <form action="{{ route('library.updateType', $type->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $type->name }}" required>
                    <button type="submit">Update</button>
                </form>
                <form action="{{ route('library.destroyType', $type->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>

<!-- Form untuk Category -->
<h3>Tambah Kategori Literatur</h3>
<form action="{{ route('library.storeCategory') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama Kategori Literatur" required>
    <select name="type_id" required>
        <option value="">Pilih Jenis Literatur</option>
        @foreach ($types as $type)
        <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select>
    <button type="submit">Tambah Kategori Literatur</button>
</form>

<h3>Daftar Kategori Literatur</h3>
<table border="1">
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
            <td>
                <form action="{{ route('library.updateCategory', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $category->name }}" required>
                    <select name="type_id" required>
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == $category->type_id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit">Update</button>
                </form>
                <form action="{{ route('library.destroyCategory', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>

<!-- Form untuk Literature -->
<h3>Tambah Literatur</h3>
<form action="{{ route('library.storeLiterature') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Judul Literatur" required>
    <input type="text" name="author" placeholder="Penulis Literatur" required>
    <input type="text" name="publisher" placeholder="Penerbit Literatur (tidak wajib)">
    <input type="number" name="year" placeholder="Tahun Terbit Literatur" required>
    <input type="url" name="file_url" placeholder="Link Literatur" required>
    <select name="category_id" required>
        <option value="">Pilih Kategori Literatur</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>
    <textarea name="description" placeholder="Deskripsi Literatur (tidak wajib)"></textarea>
    <textarea name="detail" placeholder="Detail Literatur (tidak wajib)"></textarea>
    <button type="submit">Tambah Literatur</button>
</form>

<h3>Daftar Literatur</h3>
<table border="1">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Link</th>
            <th>Deskripsi</th>
            <th>Detail</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($literatures as $literature)
        <tr>
            <td>
                <input type="text" name="title" value="{{ $literature->title }}" readonly>
            </td>
            <td>
                <input type="text" name="author" value="{{ $literature->author }}" readonly>
            </td>
            <td>
                <input type="text" name="publisher" value="{{ $literature->publisher ?? '-' }}" readonly>
            </td>
            <td>
                <input type="number" name="year" value="{{ $literature->year }}" readonly>
            </td>
            <td>
                <a href="{{ $literature->file_url }}" target="_blank">Lihat File</a>
            </td>
            <td>
                <textarea name="description" readonly>{{ $literature->description ?? '-' }}</textarea>
            </td>
            <td>
                <textarea name="detail" readonly>{{ $literature->detail ?? '-' }}</textarea>
            </td>
            <td>
                <select name="category_id" disabled>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $literature->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </td>
            <td>
                <!-- Form Update -->
                <form action="{{ route('library.updateLiterature', $literature->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" value="{{ $literature->title }}" required>
                    <input type="text" name="author" value="{{ $literature->author }}" required>
                    <input type="text" name="publisher" value="{{ $literature->publisher ?? '-' }}">
                    <input type="number" name="year" value="{{ $literature->year }}" required>
                    <input type="url" name="file_url" value="{{ $literature->file_url }}" required>
                    <select name="category_id" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $literature->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <textarea name="description">{{ $literature->description ?? '-' }}</textarea>
                    <textarea name="detail">{{ $literature->detail ?? '-' }}</textarea>
                    <button type="submit">Update</button>
                </form>
                <!-- Form Delete -->
                <form action="{{ route('library.destroyLiterature', $literature->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

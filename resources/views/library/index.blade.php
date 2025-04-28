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
    <select name="category_id" required>
        <option value="">Pilih Kategori Literatur</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Tambah Literatur</button>
</form>

<h3>Daftar Literatur</h3>
<table border="1">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($literatures as $literature)
        <tr>
            <td>{{ $literature->title }}</td>
            <td>{{ $literature->author }}</td>
            <td>{{ $literature->category->name }}</td>
            <td>
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

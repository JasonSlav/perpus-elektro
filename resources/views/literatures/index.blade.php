@extends('layouts.app')

@section('title', 'Daftar Literatur')

@section('content')
<h2>Daftar Literatur</h2>
<table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Tipe</th>
        <th>File</th>
    </tr>
    @foreach ($literatures as $literature)
    <tr>
        <td>{{ $literature->title }}</td>
        <td>{{ $literature->author ?? '-' }}</td>
        <td>{{ $literature->publisher ?? '-' }}</td>
        <td>{{ $literature->year ?? '-' }}</td>
        <td>{{ ucfirst($literature->type) }}</td>
        <td>
            @if ($literature->file_url)
                <a href="{{ asset($literature->file_url) }}" target="_blank">Lihat</a>
            @else
                -
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection

@extends('layouts.app')

@section('header_title', 'Detail Perlengkapan')

@section('content')
    <h3>Detail Data Perlengkapan</h3>

    <table>
        <tr>
            <th style="width: 220px;">Kode</th>
            <td>{{ $item['kode'] }}</td>
        </tr>
        <tr>
            <th>Nama Perlengkapan</th>
            <td>{{ $item['nama'] }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $item['kategori'] }}</td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $item['lokasi'] }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $item['jumlah'] }}</td>
        </tr>
        <tr>
            <th>Kondisi</th>
            <td>{{ $item['kondisi'] }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $item['keterangan'] }}</td>
        </tr>
    </table>

    <div style="margin-top: 16px;">
        <a href="{{ route('perlengkapan.edit', $item['kode']) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('perlengkapan.destroy', $item['kode']) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus data {{ $item['kode'] }} - {{ $item['nama'] }}?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        <a href="{{ route('perlengkapan.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>
@endsection
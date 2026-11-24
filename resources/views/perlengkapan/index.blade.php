@extends('layouts.app')

@section('header_title', 'Daftar Perlengkapan Kelas')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Data Perlengkapan</h3>
        <a href="{{ route('perlengkapan.create') }}" class="btn btn-primary">+ Tambah Perlengkapan</a>
    </div>

    @if (count($daftarPerlengkapan) === 0)
        <p>Belum ada data perlengkapan yang tersimpan di <em>session</em> saat ini.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Perlengkapan</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarPerlengkapan as $item)
                    <tr>
                        <td>{{ $item['kode'] }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['lokasi'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>{{ $item['kondisi'] }}</td>
                        <td>
                            <a href="{{ route('perlengkapan.show', $item['kode']) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('perlengkapan.edit', $item['kode']) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('perlengkapan.destroy', $item['kode']) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus data {{ $item['kode'] }} - {{ $item['nama'] }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
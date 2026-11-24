@extends('layouts.app')

@section('header_title', 'Edit Data Perlengkapan')

@section('content')
    <h3>Form Edit Perlengkapan ({{ $item['kode'] }})</h3>

    <form action="{{ route('perlengkapan.update', $item['kode']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" value="{{ $item['kode'] }}" disabled>
        </div>

        <div class="form-group">
            <label for="nama">Nama Perlengkapan</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $item['nama']) }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $item['kategori']) }}" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $item['lokasi']) }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $item['jumlah']) }}" min="0" required>
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select id="kondisi" name="kondisi" required>
                <option value="Baik" {{ old('kondisi', $item['kondisi']) === 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Perlu Cek" {{ old('kondisi', $item['kondisi']) === 'Perlu Cek' ? 'selected' : '' }}>Perlu Cek</option>
                <option value="Rusak" {{ old('kondisi', $item['kondisi']) === 'Rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $item['keterangan']) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('perlengkapan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
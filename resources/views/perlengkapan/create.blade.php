@extends('layouts.app')

@section('header_title', 'Tambah Data Perlengkapan')

@section('content')
    <h3>Form Tambah Perlengkapan</h3>

    <form action="{{ route('perlengkapan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" value="{{ old('kode') }}" placeholder=". . ." required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Perlengkapan</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder=". . ." required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori') }}" placeholder=". . ." required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder=". . ." required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', 1) }}" min="0" required>
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select id="kondisi" name="kondisi" required>
                <option value="Baik" {{ old('kondisi') === 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Perlu Cek" {{ old('kondisi') === 'Perlu Cek' ? 'selected' : '' }}>Perlu Cek</option>
                <option value="Rusak" {{ old('kondisi') === 'Rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="3" placeholder="Catatan tambahan (opsional)">{{ old('keterangan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="{{ route('perlengkapan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
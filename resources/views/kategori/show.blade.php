<!DOCTYPE html>
<html>
<head>
    <title>Kategori Buku - PBO</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h1>Kategori: {{ $namaKategori }}</h1>

    @if(is_null($daftarBuku))
        <p style="color: red;">Maaf, kategori "<b>{{ $namaKategori }}</b>" tidak ditemukan di sistem kami.</p>
    
    @elseif(count($daftarBuku) === 0)
        <p style="color: orange;">Kategori <b>{{ $namaKategori }}</b> tersedia, tetapi belum ada buku di dalamnya.</p>
    
    @else
        <p>Menampilkan buku dalam kategori ini:</p>
        <ol>
            @foreach($daftarBuku as $buku)
                <li>
                    <strong>{{ $buku['judul'] }}</strong> 
                    <br>
                    <small>Penulis: {{ $buku['penulis'] }}</small>
                </li>
            @endforeach
        </ol>
    @endif

    <br>
    <a href="{{ url('/buku') }}">Kembali ke Daftar Buku</a>

</body>
</html>
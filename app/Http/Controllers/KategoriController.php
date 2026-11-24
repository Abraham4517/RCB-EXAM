<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function show(string $nama)
    {
        $semuaBuku = [
            'pemrograman' => [
                ['judul' => 'Belajar PHP OOP', 'penulis' => 'Hilman Lesmana'],
                ['judul' => 'Dasar Laravel 13', 'penulis' => 'Budi Santoso'],
            ],
            'jaringan' => [
                ['judul' => 'Pengantar Cisco Packet Tracer', 'penulis' => 'Abraham Banyu'],
            ],
            'desain' => [] 
        ];

        $kategoriKey = strtolower($nama);
        $bukuKategori = $semuaBuku[$kategoriKey] ?? null;

        // Mengarahkan ke file view: resources/views/kategori/show.blade.php
        return view('kategori.show', [
            'namaKategori' => ucfirst($nama),
            'daftarBuku' => $bukuKategori
        ]);
    }
}
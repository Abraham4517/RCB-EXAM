# RCB-EXAM

Aplikasi **Manajemen Perlengkapan Kelas** dikembangkan sebagai project dalam mata kuliah Pemrograman Berorientasi Objek sekaligus *Capstone Project*. Aplikasi tersebut dibangun menggunakan **Laravel** dengan pola arsitektur **Route → Controller → Blade** dan mengimplementasikan operasi **CRUD** (*Create, Read, Update, Delete*) menggunakan penyimpanan **Session (`SESSION_DRIVER=file`)** tanpa koneksi basis data.

### Fitur Utama
- **Daftar Perlengkapan (`GET /perlengkapan`)  :** Menampilkan tabel berisi Kode, Nama Perlengkapan, Kategori, Lokasi, Jumlah, Kondisi, dan Aksi, lengkap dengan penanganan saat data kosong.
- **Tambah Perlengkapan (`GET /perlengkapan/create` & `POST /perlengkapan`)  :** Form penambahan data dengan validasi masukan dan pencegahan duplikasi kode.
- **Detail Perlengkapan (`GET /perlengkapan/{kode}`)  :** Menampilkan rincian lengkap satu barang beserta penanganan apabila kode tidak ditemukan.
- **Edit Perlengkapan (`GET /perlengkapan/{kode}/edit` & `PUT /perlengkapan/{kode}`)  :** Form ubah data yang menampilkan nilai lama sebagai nilai awal menggunakan `@method('PUT')`.
- **Hapus Perlengkapan (`DELETE /perlengkapan/{kode}`)  :** Penghapusan data dari *session* menggunakan `@method('DELETE')` disertai dialog konfirmasi sebelum pengiriman.

---

## Daftar Route Aplikasi

| No. | HTTP Method | URI | Nama Route | Controller Action |
| :-: | :--- | :--- | :--- | :--- |
| 1 | `GET` | `/perlengkapan` | `perlengkapan.index` | `PerlengkapanController@index` |
| 2 | `GET` | `/perlengkapan/create` | `perlengkapan.create` | `PerlengkapanController@create` |
| 3 | `POST` | `/perlengkapan` | `perlengkapan.store` | `PerlengkapanController@store` |
| 4 | `GET` | `/perlengkapan/{kode}` | `perlengkapan.show` | `PerlengkapanController@show` |
| 5 | `GET` | `/perlengkapan/{kode}/edit` | `perlengkapan.edit` | `PerlengkapanController@edit` |
| 6 | `PUT` | `/perlengkapan/{kode}` | `perlengkapan.update` | `PerlengkapanController@update` |
| 7 | `DELETE` | `/perlengkapan/{kode}` | `perlengkapan.destroy` | `PerlengkapanController@destroy` |

---

## Struktur File Utama

```text
pbo-laravel/
├── app/
│   └── Http/
│       └── Controllers/
│           └── PerlengkapanController.php   # Logika CRUD berbasis session & validasi
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php                # Layout utama (header, navigasi, alert, footer)
│       └── perlengkapan/
│           ├── index.blade.php              # Halaman daftar perlengkapan
│           ├── create.blade.php             # Form tambah perlengkapan
│           ├── show.blade.php               # Halaman detail perlengkapan
│           └── edit.blade.php               # Form ubah perlengkapan
├── routes/
│   └── web.php                              # Definisi 7 route CRUD + redirect halaman utama
├── .env.example                             
└── README.md                                
```

---

## Sytem Requirements

Pastikan perangkat lunak tersebut telah terpasang sebelum menjalankan aplikasi:

1. **PHP** (sesuai lingkungan praktikum kelas, disarankan PHP 8.2+ / 8.3+ melalui [XAMPP](https://www.apachefriends.org/download.html))
2. **Composer 2.x** — [Unduh Composer](https://getcomposer.org/download/)
3. **Git** — [Unduh Git](https://git-scm.com/downloads)
4. **Visual Studio Code** (opsional sebagai editor) — [Unduh VS Code](https://code.visualstudio.com/)

---

## Cara Instalasi dan Menjalankan Proyek

1. **Clone repositori ini:**
   ```bash
   git clone https://github.com/Abraham4517/RCB-EXAM
   cd pbo-laravel
   ```

2. **Instal dependensi PHP melalui Composer:**
   ```bash
   composer install
   ```

3. **Siapkan berkas konfigurasi `.env`:**
   Salin berkas `.env.example` menjadi `.env`:
   ```bash
   copy .env.example .env
   ```
   *(Gunakan `cp .env.example .env` jika memakai Git Bash / macOS / Linux).*

   Buka berkas `.env` dan pastikan pengaturan driver *session* menggunakan `file` (bukan `database`):
   ```env
   SESSION_DRIVER=file
   ```

4. **Generate kunci aplikasi dan bersihkan cache:**
   ```bash
   php artisan key:generate
   php artisan optimize:clear
   ```

5. **Verifikasi daftar route (opsional):**
   ```bash
   php artisan route:list --path=perlengkapan
   ```

6. **Jalankan server pengembangan lokal:**
   ```bash
   php artisan serve
   ```

7. **Buka aplikasi di browser:**
   Akses `http://127.0.0.1:8000/perlengkapan` 

---

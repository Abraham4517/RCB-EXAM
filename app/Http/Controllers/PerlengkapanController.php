<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerlengkapanController extends Controller
{
    private string $sessionKey = 'data_perlengkapan_kelas';

    private function getDataPerlengkapan(Request $request): array
    {
        if (!$request->session()->has($this->sessionKey)) {
            $dataAwal = [
                'INV-001' => [
                    'kode' => 'INV-001',
                    'nama' => 'Spidol Papan Tulis Boardmarker',
                    'kategori' => 'Perlengkapan Kelas',
                    'lokasi' => 'Lemari Kelas',
                    'jumlah' => 12,
                    'kondisi' => 'Baik',
                    'keterangan' => 'Dibeli dari dana kas kelas bulan Oktober.',
                ],
                'INV-002' => [
                    'kode' => 'INV-002',
                    'nama' => 'Penghapus Papan Tulis',
                    'kategori' => 'Perlengkapan Kelas',
                    'lokasi' => 'Meja Guru',
                    'jumlah' => 2,
                    'kondisi' => 'Baik',
                    'keterangan' => 'Kondisi bersih dan siap pakai.',
                ],
                'INV-003' => [
                    'kode' => 'INV-003',
                    'nama' => 'Kabel Roll Extension',
                    'kategori' => 'Elektronik',
                    'lokasi' => 'Sudut Kelas',
                    'jumlah' => 1,
                    'kondisi' => 'Perlu Cek',
                    'keterangan' => 'Saklar agak longgar, perlu diperiksa.',
                ],
            ];
            $request->session()->put($this->sessionKey, $dataAwal);
        }

        return $request->session()->get($this->sessionKey, []);
    }

    public function index(Request $request)
    {
        $daftarPerlengkapan = $this->getDataPerlengkapan($request);

        return view('perlengkapan.index', [
            'judulHalaman' => 'Daftar Perlengkapan Kelas',
            'daftarPerlengkapan' => $daftarPerlengkapan,
        ]);
    }

    public function create()
    {
        return view('perlengkapan.create', [
            'judulHalaman' => 'Tambah Data Perlengkapan',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:30',
            'nama' => 'required|string|max:120',
            'kategori' => 'required|string|max:80',
            'lokasi' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|string|max:60',
            'keterangan' => 'nullable|string|max:255',
        ], [
            'kode.required' => 'Kode wajib diisi.',
            'nama.required' => 'Nama barang/perlengkapan wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'lokasi.required' => 'Lokasi wajib diisi.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka bulat.',
            'jumlah.min' => 'Jumlah tidak boleh kurang dari 0.',
            'kondisi.required' => 'Kondisi wajib diisi.',
        ]);

        $daftarPerlengkapan = $this->getDataPerlengkapan($request);
        $kode = strtoupper(trim($validated['kode']));

        if (isset($daftarPerlengkapan[$kode])) {
            return redirect()
                ->route('perlengkapan.create')
                ->withInput()
                ->with('error', "Data dengan kode {$kode} sudah ada di session.");
        }

        $itemBaru = [
            'kode' => $kode,
            'nama' => trim($validated['nama']),
            'kategori' => trim($validated['kategori']),
            'lokasi' => trim($validated['lokasi']),
            'jumlah' => (int) $validated['jumlah'],
            'kondisi' => trim($validated['kondisi']),
            'keterangan' => trim($validated['keterangan'] ?? '-'),
        ];

        $daftarPerlengkapan[$kode] = $itemBaru;
        $request->session()->put($this->sessionKey, $daftarPerlengkapan);

        return redirect()
            ->route('perlengkapan.index')
            ->with('success', "Data perlengkapan {$kode} ({$itemBaru['nama']}) berhasil ditambahkan.");
    }

    public function show(Request $request, string $kode)
    {
        $daftarPerlengkapan = $this->getDataPerlengkapan($request);
        $kodeKey = strtoupper($kode);

        if (!isset($daftarPerlengkapan[$kodeKey])) {
            return redirect()
                ->route('perlengkapan.index')
                ->with('error', "Data dengan kode {$kodeKey} tidak ditemukan.");
        }

        return view('perlengkapan.show', [
            'judulHalaman' => 'Detail Perlengkapan',
            'item' => $daftarPerlengkapan[$kodeKey],
        ]);
    }

    public function edit(Request $request, string $kode)
    {
        $daftarPerlengkapan = $this->getDataPerlengkapan($request);
        $kodeKey = strtoupper($kode);

        if (!isset($daftarPerlengkapan[$kodeKey])) {
            return redirect()
                ->route('perlengkapan.index')
                ->with('error', "Data dengan kode {$kodeKey} tidak ditemukan untuk diubah.");
        }

        return view('perlengkapan.edit', [
            'judulHalaman' => 'Edit Data Perlengkapan',
            'item' => $daftarPerlengkapan[$kodeKey],
        ]);
    }

    public function update(Request $request, string $kode)
    {
        $daftarPerlengkapan = $this->getDataPerlengkapan($request);
        $kodeKey = strtoupper($kode);

        if (!isset($daftarPerlengkapan[$kodeKey])) {
            return redirect()
                ->route('perlengkapan.index')
                ->with('error', "Data dengan kode {$kodeKey} tidak ditemukan.");
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:120',
            'kategori' => 'required|string|max:80',
            'lokasi' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|string|max:60',
            'keterangan' => 'nullable|string|max:255',
        ], [
            'nama.required' => 'Nama barang/perlengkapan wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'lokasi.required' => 'Lokasi wajib diisi.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka bulat.',
            'jumlah.min' => 'Jumlah tidak boleh kurang dari 0.',
            'kondisi.required' => 'Kondisi wajib diisi.',
        ]);

        $daftarPerlengkapan[$kodeKey] = [
            'kode' => $kodeKey,
            'nama' => trim($validated['nama']),
            'kategori' => trim($validated['kategori']),
            'lokasi' => trim($validated['lokasi']),
            'jumlah' => (int) $validated['jumlah'],
            'kondisi' => trim($validated['kondisi']),
            'keterangan' => trim($validated['keterangan'] ?? '-'),
        ];

        $request->session()->put($this->sessionKey, $daftarPerlengkapan);

        return redirect()
            ->route('perlengkapan.index')
            ->with('success', "Data perlengkapan {$kodeKey} berhasil diperbarui.");
    }

    public function destroy(Request $request, string $kode)
    {
        $daftarPerlengkapan = $this->getDataPerlengkapan($request);
        $kodeKey = strtoupper($kode);

        if (!isset($daftarPerlengkapan[$kodeKey])) {
            return redirect()
                ->route('perlengkapan.index')
                ->with('error', "Data dengan kode {$kodeKey} tidak ditemukan atau sudah dihapus.");
        }

        $namaTerhapus = $daftarPerlengkapan[$kodeKey]['nama'];
        unset($daftarPerlengkapan[$kodeKey]);
        $request->session()->put($this->sessionKey, $daftarPerlengkapan);

        return redirect()
            ->route('perlengkapan.index')
            ->with('success', "Data perlengkapan {$kodeKey} ({$namaTerhapus}) berhasil dihapus.");
    }
}
?>
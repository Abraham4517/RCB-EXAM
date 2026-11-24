<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judulHalaman ?? 'Manajemen Perlengkapan' }} - PBO Laravel</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f7fa; color: #222; }
        header { background: #1e293b; color: #fff; padding: 16px 24px; }
        nav { background: #334155; padding: 10px 24px; }
        nav a { color: #f8fafc; text-decoration: none; margin-right: 16px; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        main { max-width: 1000px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 6px; box-shadow: 0 1px 4px rgba(0,0,0,0.08); }
        footer { text-align: center; padding: 16px; color: #64748b; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #cbd5e1; padding: 10px; text-align: left; }
        th { background: #e2e8f0; }
        .alert-success { background: #dcfce7; color: #166534; padding: 12px; border-radius: 4px; margin-bottom: 16px; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 4px; margin-bottom: 16px; }
        .btn { display: inline-block; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 13px; border: none; cursor: pointer; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-info { background: #0284c7; color: #fff; }
        .btn-warning { background: #d97706; color: #fff; }
        .btn-danger { background: #dc2626; color: #fff; }
        .btn-secondary { background: #64748b; color: #fff; }
        .form-group { margin-bottom: 14px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="number"], select, textarea { width: 100%; padding: 8px; border: 1px solid #cbd5e1; border-radius: 4px; box-sizing: border-box; }
    </style>
</head>
<body>
    <header>
        <h2>@yield('header_title', 'Sistem Perlengkapan Kelas (PBO Laravel)')</h2>
    </header>

    <nav>
        <a href="{{ route('perlengkapan.index') }}">Daftar Perlengkapan</a>
        <a href="{{ route('perlengkapan.create') }}">Tambah Perlengkapan</a>
    </nav>

    <main>
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <strong>Terjadi kesalahan input:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        Daftar Perlengkapan Kelas &mdash; Pemrograman Berorientasi Objek
    </footer>
</body>
</html>